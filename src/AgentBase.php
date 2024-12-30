<?php

namespace AutoPHP;

abstract class AgentBase
{
    public function __construct(protected bool $verbose = true)
    {
    }
}
