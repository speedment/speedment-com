<?php

class SGException extends Exception
{
	public function __toString()
    {
        return get_class($this).": {$this->message}";
    }
}

class SGExceptionNotFound extends SGException
{
    public function __construct($msg = 'Not found')
    {
        parent::__construct($msg, 404, null);
    }
}

class SGExceptionForbidden extends SGException
{
    public function __construct($msg = 'Forbidden')
    {
        parent::__construct($msg, 403, null);
    }
}

class SGExceptionBadRequest extends SGException
{
    public function __construct($msg = 'Bad request')
    {
        parent::__construct($msg, 400, null);
    }
}

class SGExceptionMethodNotAllowed extends SGException
{
    public function __construct($msg = 'Method not allowed')
    {
        parent::__construct($msg, 405, null);
    }
}

class SGExceptionDatabaseError extends SGException
{
    public function __construct($msg = 'Database error')
    {
        parent::__construct($msg, 500, null);
    }
}

class SGExceptionServerError extends SGException
{
    public function __construct($msg = 'Internal server error')
    {
        parent::__construct($msg, 500, null);
    }
}

class SGExceptionSkip extends SGException
{
    public function __construct($msg = 'Skip exception')
    {
        parent::__construct($msg, 1, null);
    }
}

class SGExceptionExecutionTimeError extends SGException
{
    public function __construct($msg = 'Execution timeout error')
    {
        parent::__construct($msg, 2, null);
    }
}


class SGExceptionIO extends SGException
{
    public function __construct($msg = 'IO read/write error')
    {
        parent::__construct($msg, 3, null);
    }
}

class SGExceptionMigrationError extends SGException
{
    public function __construct($msg = 'Migration error')
    {
        parent::__construct($msg, 4, null);
    }
}
