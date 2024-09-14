<?php

namespace ZLabs\RospilOrder\Components;


use Bitrix\Main\Type\DateTime;
use ZLabs\RospilOrder\Exception\ComponentException;
use ZLabs\RospilOrder\Models\OrderNote;
use ZLabs\RospilOrder\Models\OrderStatus;

class FormCustom extends Form
{
    const STATUSES = [
        0 => [
            'oldStatus' => 'Заказ в стадии оформления.',
            'status' => 'Оформлен',
            'note' => 'Вы оформили заказ',
        ],
        1 => [
            'oldStatus' => 'На согласовании',
            'status' => 'Проверка эскиза',
            'note' => 'Согласовываем детали заказа с клиентом',
        ],
        2 => [
            'oldStatus' => 'Заказ обрабатывается инженером.',
            'status' => 'Обрабатывается инженером',
            'note' => 'Инженер рассчитывает ваш заказ для передачи в цех',
        ],
        3 => [
            'oldStatus' => 'Заказ комплектуется материалом.',
            'status' => 'Доставка материала для заказа',
            'note' => 'Уточняем наличие материала для заказа согласно схеме инженера',
        ],
        4 => [
            'oldStatus' => 'Заказ в очереди на изготовление.',
            'status' => 'Укомплектован ожидает изготовления',
            'note' => 'Ожидает изготовления в цеху',
        ],
        5 => [
            'oldStatus' => 'Заказ изготавливается.',
            'status' => 'Изготавливается',
            'note' => 'Ребята уже пилят',
        ],
        6 => [
            'oldStatus' => 'Заказ изготовлен, ожидает отгрузки.',
            'status' => 'Ожидает отгрузки',
            'note' => 'Вроде все понятно',
        ],
        7 => [
            'oldStatus' => 'Заказ отгружен со склада.',
            'status' => 'Отгружен',
            'note' => 'Производим отгрузку и установку мебели',
        ],
        8 => [
            'oldStatus' => 'Заказ выполнен.',
            'status' => 'Выполнен',
            'note' => 'Заказ завершен. Спасибо, что воспользовались. нашими услугами',
        ],
    ];


    protected function oldObtainData()
    {
        $statuses = OrderStatus::query()
            ->filter(['ORDER_NUMBER' => $this->order])
            ->sort('ID')
            ->getList();

        $lastStatus = $statuses->last();
        $lastStatusData = collect($lastStatus);
        $resultStatusData = $lastStatusData->map(function ($text, $key) {
            return [
                'key' => "{$key}",
                'status' => "{$text}"
            ];
        });

        $leftToPay = (float)$resultStatusData->get("LEFT_TO_PAY")["status"];
        $orderPrice = (float)$resultStatusData->get("ORDER_PRICE")["status"];

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
                'date' => $this->dateFormat(new DateTime($arItem['date'])),
                'dateSort' => strtoupper($date->getTimestamp()),
                'type' => 'note',
                'status' => $arItem['status'],
                'orderType' => $arItem['ORDER_TYPE'],
            ];
        });
        $statusesData = $statuses->map(function ($arItem) {
            $date = new \DateTime($this->fullDateFormat($arItem['DATE']));
            return [
                'date' => $this->dateFormat($arItem['DATE']),
                'dateSort' => strtoupper($date->getTimestamp()),
                'type' => 'status',
                'status' => $arItem['STATUS'],
                'orderType' => $arItem['ORDER_TYPE'],
            ];
        });

        $lines = $statusesData->concat($notesData)->sortBy('dateSort')->unique('status');

        $showPaymentBtn = ($leftToPay > 0);
        $showPaymentInfo = $showPaymentBtn && ($orderPrice > 0);
        $paidSum = $orderPrice - $leftToPay;

        $this->arResult = [
            'issetResult' => true,
            'order' => $this->order,
            'customer' => $lastStatus['CUSTOMER'],
            'outputDate' => $lastStatus['OUTPUT_DATE'] ? $this->dateFormat($lastStatus['OUTPUT_DATE']) : false,
            'firstInstallationDate' => $lastStatus['FIRST_INSTALLATION_DATE'] ? $this->dateFormat($lastStatus['FIRST_INSTALLATION_DATE']) : false,
            'installationDate' => $lastStatus['INSTALLATION_DATE'] ? $this->dateFormat($lastStatus['INSTALLATION_DATE']) : false,
            'queuePosition' => $lastStatus['QUEUE_POSITION'],
            'queuePositionWordForm' => $this->endingsForm(
                $lastStatus['QUEUE_POSITION'],
                'человек',
                'человека',
                'человек'
            ),

            'lines' => $lines,
            'statuses' => $statuses->map(function ($arItem) {
                return [
                    'date' => $this->dateFormat($arItem['DATE']),
                    'status' => $arItem['STATUS']
                ];
            }),
            'notes' => $notes->map(function ($arItem) {
                return [
                    'text' => $arItem['date'] . ' ' . $arItem['status']
                ];
            }),
            'sum' => number_format($leftToPay, 2, '.', ' '),
            'orderPrice' => number_format($orderPrice, 2, '.', ' '),
            'paidSum' => number_format($paidSum, 2, '.', ' '),
            'leftToPay' => number_format($leftToPay, 2, '.', ' '),

            'showPaymentButton' => $showPaymentBtn,
            'showOrderPrice' => $showPaymentInfo,
            'finished' => $statuses
                    ->filter(function ($arItem) {
                        return $arItem['STATUS'] === static::ORDER_FINISHED_STATUS_TEXT;
                    })
                    ->count() > 0
        ];
        if ($lastStatus['FIRST_INSTALLATION_DATE'] && $lastStatus['INSTALLATION_DATE']) {
            $this->arResult['installationDateBeenChanged'] = $this->installationDateBeenChanged(
                $lastStatus['FIRST_INSTALLATION_DATE'],
                $lastStatus['INSTALLATION_DATE']
            );
        }
    }

    protected function obtainData()
    {
        $this->oldObtainData();

        $statuses = [];
        $activeStatuses = $this->arResult['lines']
            ->filter(function ($arLine) {
                return $arLine['type'] === 'status';
            });
        $TYPE_1 = [
            static::STATUSES[0],
            static::STATUSES[3],
            static::STATUSES[4],
            static::STATUSES[5],
            static::STATUSES[6],
            static::STATUSES[8],
        ];
        $TYPE_2 = static::STATUSES;
        $TYPE_3 = [
            static::STATUSES[0],
            static::STATUSES[1],
            static::STATUSES[2],
            static::STATUSES[3],
            static::STATUSES[4],
            static::STATUSES[5],
            static::STATUSES[6],
            static::STATUSES[8],
        ];
        $orderType = ($this->arResult['lines']->last())['orderType'];

        switch ($orderType) {
            case '1':
                $statuses = $TYPE_1;
                break;
            case '2':
                $statuses = $TYPE_2;
                break;
            case '3':
                $statuses = $TYPE_3;
                break;
            default:
                $statuses = static::STATUSES;
        }

        $this->arResult['lines'] = collect($statuses)
            ->map(function ($arStatus) use ($activeStatuses) {
                $activeStatus = $activeStatuses->first(function ($arLine) use ($arStatus) {
                    return $arLine['status'] === $arStatus['oldStatus'];
                });

                if ($activeStatus) {
                    $arStatus['active'] = true;
                    $arStatus['date'] = $activeStatus['date'];
                }

                return $arStatus;
            });
    }
}