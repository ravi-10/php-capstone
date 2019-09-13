<?php
/**
 * User Model Class Page 
 * last_update: 2019-09-13
 * Author: Ravi Patel, patel-r89@webmail.uwinnipeg.ca
 */

namespace App;

class UserModel extends Model
{

	/**
	 * Model table
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * Model key
	 * @var string
	 */
	protected $key = 'user_id';

	/**
	 * Return all users who are allowed to manage blog
	 * @param String $order_by column field to order tours
	 * @param String $for 'backend' or 'frontend' to create specific query
	 * @return Mixed array
	 */
	public function allBloggers($order_by, $for)
	{
		$query = "SELECT * FROM {$this->table}
					WHERE is_deleted = false 
					AND (role = 'admin' OR role = 'blogger') 
					ORDER BY $order_by";

		$stmt = static::$dbh->prepare($query);

		$stmt->execute();

		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}

}