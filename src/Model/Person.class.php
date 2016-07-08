<?php
namespace Devbox\Model;

abstract class Person
{
    abstract public function connect();
    abstract public function disconnect();
}
