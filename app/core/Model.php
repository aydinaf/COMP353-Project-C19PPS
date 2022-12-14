<?php

class Model
{
    protected $_connection;
    protected $_className = null;
    protected $_whereClause;
    protected $_orderBy;
    protected $_PKName = ['ID']; // default name for the primary key

    public function __construct(PDO $connection = null)
    {
        //database parameters        
        $dbConfig = include('../../DatabaseConnection.php');

        $this->_connection = $connection;
        echo $dbConfig->HOST;
        if ($this->_connection === null) {
            $this->_connection = new PDO("mysql:host=$dbConfig->HOST;dbname=$dbConfig->SCHEMA", $dbConfig->USERNAME, $dbConfig->PASSWORD);
            $this->_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        $this->_className = get_class($this);
    }

    protected function getProps()
    {
        //extract the deriving class name
        $exclusions = get_class_vars(__CLASS__); //properties from the Model base class to exclude from SQL

        //extract the deriving class properties
        $classProps = [];
        $array = get_object_vars($this);
        foreach ($array as $key => $value) {
            if (!array_key_exists($key, $exclusions)) {
                $classProps[] = $key;
            }
        }
        return $classProps;
    }

    protected function toArray($properties)
    {
        $data = [];
        foreach ($properties as $prop) {
            $data[$prop] = $this->$prop;
        }
        return $data;
    }

    /*
    public function find($ID)
    {
        $selectOne     = "SELECT * FROM $this->_className WHERE";
        foreach ($this->_PKName as $key => $pk) {
            $selectOne .= "$pk = :$pk";
            if ($key < count($this->_PKName) - 1)
                $selectOne .= " AND ";
        }

        $stmt = $this->_connection->prepare($selectOne);
        $stmt->execute(array($this->_PKName => $ID));

        $stmt->setFetchMode(PDO::FETCH_CLASS, $this->_className);
        $value = $stmt->fetch();        
        return $value;
    }
    */

    // SELECT * FROM Client WHERE firstName = 'Jon' AND lastName = 'Doe'
    public function where($field, $op, $value)
    {
        //TODO : only if this is a string-type value
        $value = $this->_connection->quote($value);
        if ($this->_whereClause == '') {
            $this->_whereClause .= "WHERE $field $op $value";
        } else {
            $this->_whereClause .= " AND $field $op $value";
        }

        return $this;
    }

    // SELECT * FROM Client ... ORDERBY firstName ASC, lastName ASC
    public function orderBy($field, $order = 'ASC')
    {
        if ($this->_orderBy == '') {
            $this->_orderBy .= "ORDERBY $field $order";
        } else {
            $this->_orderBy .= ", $field $order";
        }

        return $this;
    }

    //run select statements
    public function get()
    {
        $select    = "SELECT * FROM $this->_className $this->_whereClause $this->_orderBy";

        $stmt = $this->_connection->prepare($select);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, $this->_className);
        $returnVal = [];
        while ($rec = $stmt->fetch()) {
            $returnVal[] = $rec;
        }
        return $returnVal;
    }

    public function insert()
    {
        $properties = $this->getProps();
        $num = count($properties);
        $insert = '';
        if ($num  > 0) {
            $insert     = 'INSERT INTO ' . $this->_className . '(' . implode(',', $properties) . ') VALUES (:' . implode(',:', $properties) . ')';
        }
        $stmt = $this->_connection->prepare($insert);
        $stmt->execute($this->toArray($properties));
    }

    public function update()
    {
        $properties = $this->getProps();
        $num = count($properties);
        $update = '';
        if ($num  > 0) {
            //update
            $setClause = [];

            foreach ($properties as $item) {
                $setClause[] = sprintf('%s = :%s', $item, $item);
            }
            $setClause = implode(', ', $setClause);
            $update = 'UPDATE ' . $this->_className . ' SET ' . $setClause . ' WHERE ';
            foreach ($this->_PKName as $key => $pk) {
                $update .= $pk . ' = :' . $pk;
                if ($key < count($this->_PKName) - 1) {
                    $update .= ' AND ';
                }
            }
        }

        $stmt = $this->_connection->prepare($update);
        $stmt->execute($this->toArray($properties));
    }

    public function delete($keyArray)
    {
        if (count($keyArray) == count($this->_PKName)) {
            $delete = 'DELETE FROM ' . $this->_className . ' WHERE ';
            foreach ($this->_PKName as $key => $pk) {
                $delete .= $pk . ' = :' . $keyArray[$key];
                if ($key < count($this->_PKName) - 1) {
                    $delete .= ' AND ';
                }
            }
            $stmt = $this->_connection->prepare($delete);
            $stmt->execute($this->toArray($this->_PKName));
        }
    }
}
