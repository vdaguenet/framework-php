<?php

namespace Dao;

use Model\News;
use Framework\Dao;

class NewsDao extends Dao
{
	/**
	* static public function save
	* Save a news in database
	* @param {News} $news 
	*/
	static public function save( News $news )
	{
		$stmt = self::getDatabase()->prepare('INSERT INTO news(title, author, content) VALUES (:title, :author, :content)');

		$stmt->bindValue(':title', $news->getTitle(), \PDO::PARAM_STR);
		$stmt->bindValue(':author', $news->getAuthor(), \PDO::PARAM_STR);
		$stmt->bindValue(':content', $news->getContent(), \PDO::PARAM_STR);

		$stmt->execute();
	}

	/**
	* static public function listAllNews
	* @return {Array}
	*/
	static public function listAllNews()
	{

		$newsList = array();

		$stmt = self::getDatabase()->prepare('
				SELECT id, title, author, content
				FROM news
			');

		$stmt->execute();

		$data = $stmt->fetchAll(\PDO::FETCH_ASSOC);

		foreach ($data as $key => $value) {
			$newsList[] = new News($value['id'], $value['title'], $value['author'], $value['content']);
		}

		return $newsList;
	}

	/**
	* static public function findOneById
	* @param {Integer} $id
	* @return {News}
	*/
	static public function findNewsById($id)
	{
		$stmt = self::getDatabase()->prepare('
				SELECT title, author, content
				FROM news
				WHERE id = :id
			');
		$stmt->bindValue(':id', $id, \PDO::PARAM_INT);
		$stmt->execute();

		$data = $stmt->fetch(\PDO::FETCH_ASSOC);

		if (false === $data) {
			
			return false;
		}

		return new News($id, $data['title'], $data['author'], $data['content']); 
	}

	/**
	* static public function deleteNewsById
	* @param {Integer} $id 
	* @return {}
	*/
	static public function deleteNewsById($id)
	{	
		if(self::findNewsById($id) instanceof News) {
			$stmt = self::getDatabase()->prepare('DELETE FROM news WHERE id = :id');
			$stmt->bindValue(':id', $id, \PDO::PARAM_INT);
			$stmt->execute();
		} else {
			throw new \Exception("Error News unexistent");
		}
	}
}