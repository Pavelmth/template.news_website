<?php

abstract class AbstractModel
{
    static protected $table;

    protected $data = [];

    public function __set($k, $v) {
        $this->data[$k] = $v;
    }

    public function __get($k)
    {
        return $this->data[$k];
    }

    public static function findAll() {
        $class = get_called_class();
        $sql = 'SELECT * FROM ' . static::$table;
        $db = new DB();
        $db->setClassName($class);
        return $db->query($sql);
    }

    public static function findOneByFk($id) {
        $class = get_called_class();
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
        $db = new DB();
        $db->setClassName($class);
        return $db->query($sql, [':id' => $id])[0];
    }

    public static function findOneByColumn($column, $value) {
        $class = get_called_class();
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE ' . $column . ' LIKE ' . '\'%' . $value . '%\'';
        $db = new DB();
        $db->setClassName($class);
        $res = $db->query($sql);
        if(empty($res)) {
            throw new ModelEcxeption('News not found.');
        }
        if (!empty($res)) {
            return $res;
        }
    }

    protected function insert() {
        $cols = array_keys($this->data);
        $ins = [];
        $data = [];

        foreach ($cols as $col) {
            $ins[] = ':'. $col;
            $data[':' . $col] = $this->data[$col];
        }

        $sql =  'INSERT INTO ' . static::$table . ' (' . implode(', ', $cols ). ') VALUES (' . implode(', ', $ins ). ') ';
        $data;

        $db = new DB();
        $db->execute($sql, $data);
        $this->id = $db->lastInsertId();
    }

    protected function update() {
        $cols = [];
        $data = [];
        foreach ($this->data as $key => $value) {
            $data[':' . $key] = $value;
            if ('id' == $key) {
                continue;
            }
            $cols[] = $key . '=:' . $key;
        }
        $sql = 'UPDATE '. static::$table . ' SET ' . implode(', ', $cols) . ' WHERE id=:id';
        $db = new DB();
        $db->execute($sql, $data);
    }

    public function save() {
        if (isset($this->id)) {
            $this->insert();
        } else {$this->update();}
    }

    public function delete() {
        $sql = 'DELETE FROM '. static::$table . ' WHERE id=\'' . $this->data[id] . '\'';
        $db = new DB();
        $db->execute($sql);
    }
}