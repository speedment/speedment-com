<?php

interface SGIDatabaseAdapter
{
	/*
		The query may contain any of the following placeholders: %s, %d and %f
		The number of given parameters must be equal to the number of placeholders.
		This method must return the fetched results if the query is fetchable.
	*/
	public function query($query, $params=array());

	/*
		Execute a query and return the statement object.
	*/
	public function exec($query);

	/*
		Execute raw query. This function doesn't prepare the query, neither returns a statement object.
		Perfect for executing fast insert queries without doing cleanup or escaping.
		Returns true or false.
	*/
	public function execRaw($query);

	/*
		Fetch a row from a previously executed query.
	*/
	public function fetch($st);

	/*
		Return the last insert id.
	*/
	public function lastInsertId();

	/*
		Get the error (if any) generated by the most recent query.
	*/
	public function getLastError();

	/*
		Kill cached query results.
	*/
    public function flush();
}
