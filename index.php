<?php
require_once 'TimeTravel.php';

$one = new TimeTravel(new DateTimeImmutable('1985-12-31'), new DateTime());

var_dump($one->getStart());

$one->findDate(new DateInterval('PT1000000000S'));

var_dump($one->getEnd());
echo $one->getTravelInfo();

var_dump($one->backToFutureStepByStep(new DatePeriod($one->getEnd(), new DateInterval('P1M1W1D'), $one->getStart())));

