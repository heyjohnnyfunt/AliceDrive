<?php
/**
 * Created by PhpStorm.
 * User: skogs
 * Date: 10.04.2015
 * Time: 22:48
 */
namespace MainWebSite {

    require_once BASE_PATH . 'Core/BaseModel.php';
    require_once BASE_PATH . 'Core/BaseController.php';
    require_once BASE_PATH . 'Core/BaseView.php';

    /*
    Здесь обычно подключаются дополнительные модули, реализующие различный функционал:
        > аутентификацию
        > кеширование
        > работу с формами
        > абстракции для доступа к данным
        > ORM
        > Unit тестирование
        > Benchmarking
        > Работу с изображениями
        > Backup
        > и др.
    */

    require_once BASE_PATH . 'Core/Route.php';
    new Route();
}