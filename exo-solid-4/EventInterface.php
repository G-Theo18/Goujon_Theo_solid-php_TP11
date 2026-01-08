<?php

interface EventInterface
{
    /**
     * Returns the name of the event
     */
    public function name() : string;

    /**
     * Returns the list of properties of the event
     */
    public function fields() : array;

    /**
     * Returns the payload of the event
     */
    public function payload() : array;
}
