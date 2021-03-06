<?php namespace IlyasKazi\Instamojo;

/**
 * @see \IlyasKazi\Instamojo\
 */
class InstamojoFacade extends \Illuminate\Support\Facades\Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'instamojo';
    }
}
