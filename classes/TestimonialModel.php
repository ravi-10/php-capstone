<?php
/**
 * Testimonial Model Class Page 
 * last_update: 2019-09-08
 * Author: Ravi Patel, patel-r89@webmail.uwinnipeg.ca
 */

namespace App;

class TestimonialModel extends Model
{

	/**
	 * Model table
	 * @var string
	 */
	protected $table = 'testimonials';

	/**
	 * Model key
	 * @var string
	 */
	protected $key = 'testimonial_id';

	/**
	 * Return all testimonials from testimonials table by needed parameters
	 * @param String $order_by column field to order tours
	 * @param String $for 'backend' 0r 'frontend' to create specific query
	 * @return Mixed array
	 */
	public function all($order_by, $for)
	{
		$condition = ' WHERE testimonials.is_deleted = false 
						AND users.is_deleted = false ';
		$order = 'ASC';

		if($for == 'frontend'){
			$condition .= " AND is_published = true ";
			$order = 'DESC';
		}

		$query = "SELECT
					testimonials.*,
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
	 * Returns all searched testimonials
	 * @param  String $keywords search keyword
	 * @return Array           testimonials
	 */
	public function search($keywords)
	{
		$keywords = "%$keywords%";
		$condition = " WHERE testimonials.is_deleted = false 
						AND users.is_deleted = false 
						AND title LIKE :keywords ";

		$query = "SELECT
					testimonials.*,
					users.first_name,
					users.last_name
					FROM
					{$this->table}
					JOIN
					users USING(user_id)
					$condition
					ORDER BY
					title";

		$stmt = static::$dbh->prepare($query);

		$params = array(
			':keywords' => $keywords
		);

		$stmt->execute($params);

		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}

}