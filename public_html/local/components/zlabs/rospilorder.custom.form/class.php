<?php

namespace ZLabs\FeedbackForm\Components;

use Bitrix\Main\Loader;
use Bex\Bbc;
use Bitrix\Main\Type\DateTime;
use ZLabs\RospilOrder\Exception\ComponentException;
use ZLabs\RospilOrder\Models\OrderNote;
use ZLabs\RospilOrder\Models\OrderStatus;

/**
 * @global \CMain $APPLICATION
 */

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

if (!Loader::includeModule('bex.bbc')) {
    return false;
}

if (!Loader::includeModule('zlabs.rospilorder')) {
    return false;
}

class RospilOrderCustomForm extends Bbc\Basis
{
    const DATE_TIME_PATTERN = "/([0-9]{2}).([0-9]{2}).([0-9]{4})(\s*)(\d{1,2})(:\d{2})(:\d{2})/";
    protected $order;

    protected function executeMain()
    {
        if ($this->needObtainData()) {
            try {
                $this->obtainData();
            } catch (\Exception $exception) {
                $this->prepareErrorMessage($exception->getMessage());
            }
        } else {
            $this->prepareShowForm();
        }
    }

    protected function needObtainData()
    {
        $this->order = $this->request->get('order');

        return !empty($this->order);
    }

    protected function obtainData()
    {
        $statuses = OrderStatus::query()
            ->filter(['ORDER_NUMBER' => $this->order])
            ->sort('DATE')
            ->getList();

        $lastNote = OrderNote::query()
            ->filter(['ORDER_NUMBER' => $this->order])
            ->sort('DATE', 'DESC')
            ->first();

        $notes = \collect([$lastNote])
            ->map(function ($note) {
                $arDates = [];
                preg_match_all(static::DATE_TIME_PATTERN, $note['TEXT'], $arDates);
                $dates = \collect($arDates[0]);
                $notes = \collect(preg_split(static::DATE_TIME_PATTERN, $note['TEXT'], -1, PREG_SPLIT_NO_EMPTY));

                $notes = $notes->map(function ($text, $key) use ($dates) {
                    $date = $dates->get($key);
                    return [
                        'date' => "{$date}",
                        'status' => "{$text}",
                    ];
                });
                return $notes;
            })
            ->collapse();

        if ($statuses->count() === 0) {
            throw new ComponentException("Заказ с номером {$this->order} не найден");
        }

        $lastStatus = $statuses->last();

        $notesData = $notes->map(function ($arItem) {
            $date = new \DateTime($arItem['date']);
            return [
                'date' => $arItem['date'],
                'dateSort' => strtoupper($date->getTimestamp()),
                'type' => 'note',
                'status' => $arItem['status']
            ];
        });
        $statusesData = $statuses->map(function ($arItem) {
            $date = new \DateTime($this->dateFormat($arItem['DATE']));
            return [
                'date' => $this->dateFormat($arItem['DATE']),
                'dateSort' => strtoupper($date->getTimestamp()),
                'type' => 'status',
                'status' => $arItem['STATUS']
            ];
        });
        $lines =$statusesData->concat($notesData)->sortBy('dateSort');

        $this->arResult = [
            'issetResult' => true,
            'order' => $this->order,
            'customer' => $lastStatus['CUSTOMER'],
            'firstInstallationDate' => $this->dateFormat($lastStatus['FIRST_INSTALLATION_DATE']),
            'installationDate' => $this->dateFormat($lastStatus['INSTALLATION_DATE']),
            'queuePosition' => $lastStatus['QUEUE_POSITION'],
            'queuePositionWordForm' => $this->endingsForm(
                $lastStatus['QUEUE_POSITION'],
                'человек',
                'человека',
                'человек'
            ),
            'installationDateBeenChanged' => $this->installationDateBeenChanged(
                $lastStatus['FIRST_INSTALLATION_DATE'],
                $lastStatus['INSTALLATION_DATE']
            ),
            'lines' => $lines
        ];
    }

    protected function prepareErrorMessage($message)
    {
        $this->arResult['issetResult'] = false;
        $this->arResult['errorMessage'] = $message;
        $this->arResult['order'] = $this->order;
    }

    protected function prepareShowForm()
    {
        $this->arResult['issetResult'] = false;
    }

    protected function installationDateBeenChanged(DateTime $firstInstallationDate, DateTime $installationDate)
    {
        return !($firstInstallationDate->getTimestamp() === $installationDate->getTimestamp());
    }

    protected function dateFormat(DateTime $dateTime)
    {
        return $dateTime->format('d.m.Y h:i:s');
    }

    public function endingsForm($n, $form1, $form2, $form5)
    {
        $n = abs($n) % 100;
        $n1 = $n % 10;
        if ($n > 10 && $n < 20) return $form5;
        if ($n1 > 1 && $n1 < 5) return $form2;
        if ($n1 == 1) return $form1;
        return $form5;
    }
}
