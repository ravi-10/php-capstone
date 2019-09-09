<?php
/**
 * Blog Model Class Page 
 * last_update: 2019-09-08
 * Author: Ravi Patel, patel-r89@webmail.uwinnipeg.ca
 */

namespace App;

class BlogModel extends Model
{

	/**
	 * Model table
	 * @var string
	 */
	protected $table = 'blogs';

	/**
	 * Model key
	 * @var string
	 */
	protected $key = 'blog_id';

	/**
	 * Return all tours from tours table by needed parameters
	 * @param String $order_by column field to order tours
	 * @param String $for 'backend' 0r 'frontend' to create specific query
	 * @return Mixed array
	 */
	public function all($order_by, $for)
	{
		$condition = '';
		$order = 'ASC';

		if($for == 'frontend'){
			$condition = " WHERE is_published = true ";
			$order = 'DESC';
		}

		$query = "SELECT
					blogs.*,
					users.first_name,
					users.last_name
					FROM
					{$this->table}
					JOIN
					users USING(user_id)
					$condition
					ORDER BY
					$order_by
					$order";

		$stmt = static::$dbh->prepare($query);

		$stmt->execute();

		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}

	/**
	 * Return one result from blog table
	 * @param  INT $id blog_id
	 * @return Array of blog data
	 */
	public function one($id)
	{
		$query = "SELECT
					blogs.*,
					users.first_name,
					users.last_name
					FROM
					{$this->table}
					JOIN
					users USING(user_id)
					WHERE
					{$this->key} = :id";

		$params = array(':id' => $id);

		$stmt = static::$dbh->prepare($query);

		$stmt->execute($params);

		return $stmt->fetch(\PDO::FETCH_ASSOC);	
	}

}