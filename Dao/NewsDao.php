<?php

namespace Dao;

use Model\News;
use Framework\Dao;

/**
* Classe NewsDao. 
* DAO pour la table et les objets news. Hérite de la classe Dao
**/

class NewsDao extends Dao
{
	/**
	* Insert a news object into table news.
	* @param News $news
	**/
	static public function save( News $news )
	{
		$stmt = self::getDatabase()->prepare('INSERT INTO news(title, author, content) VALUES (:title, :author, :content)');

		$stmt->bindValue(':title', $news->getTitle(), \PDO::PARAM_STR);
		$stmt->bindValue(':author', $news->getAuthor(), \PDO::PARAM_STR);
		$stmt->bindValue(':content', $news->getContent(), \PDO::PARAM_STR);

		$stmt->execute();
	}

	/**
	* @return array of news object.
	**/
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
}