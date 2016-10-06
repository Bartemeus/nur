<?php

return [
	'class' 	=> 'yii\db\Connection',
	'dsn' 		=> 'mysql:host=127.0.0.1;dbname=ecc_nur',
	'username' 	=> 'root',
	'password' 	=> 'mysql',
	'charset'	=> 'utf8',
	/**
	 * Кэширование схем таблиц для ActiveRecord.
	 * Для очистки схемы одной таблицы:
	 *
	 * ```
	 * Yii::app()->db->schema->getTable('albums', true);
	 *
	 * ```
	 *
	 */
	'enableSchemaCache' => true,
	'schemaCacheDuration' => 3600 * 24 * 30,
	'schemaCache' => 'cache',
	/**
	 * Кэширование запросов в БД
	 *
	 * ```
	 * $result = Customer::getDb()->cache(function ($db) {
	 *     return Customer::find()->where(['id' => 1])->one();
	 * });
	 *
	 * ```
	 */
	/*'enableQueryCache'      => true,
	'queryCache'            => 'cache',
	'queryCacheDuration'    => 600,*/
];
