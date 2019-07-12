"use strict";

import './index.sass';
import IndexExampleModule from 'index-example/index-example';
import {NamedClass} from "index-example/index-example";

$(document).ready(function () {
    IndexExampleModule();

    new NamedClass();
});
