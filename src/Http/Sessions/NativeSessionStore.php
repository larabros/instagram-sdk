<?php

namespace Instagram\Http\Sessions;

/**
 * An implementation of `DataStoreInterface` that uses PHP's native sessions.
 *
 * @package    Instagram
 * @author     Hassan Khan <contact@hassankhan.me>
 * @link       https://github.com/hassankhan/instagram-sdk
 * @license    MIT
 */
class NativeSessionStore implements DataStoreInterface
{
    /**
     * @var string Prefix to use for session variables.
     */
    protected $sessionPrefix = 'IG_';

    /**
     * Creates an instance of `NativeSessionStore`.
     */
    public function __construct()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    /**
     * {@inheritDoc}
     */
    public function get($key)
    {
        if (isset($_SESSION[$this->sessionPrefix . $key])) {
            return $_SESSION[$this->sessionPrefix . $key];
        }
        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function set($key, $value)
    {
        $_SESSION[$this->sessionPrefix . $key] = $value;
    }
}
