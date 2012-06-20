<?php

class HTML_Table {
    
    private $rows = array();
    private $tableStr = '';
    
    function __construct($id = NULL, $class = NULL, $border = 0, $cellspacing = 2, $cellpadding = 0, $attr_ar = array() ) {
        $this->tableStr = "\n<table" . ( !empty($id)? " id=\"$id\"": '' ) . 
            ( !empty($class)? " class=\"$class\"": '' ) . $this->addAttribs( $attr_ar ) . 
             " border=\"$border\" cellspacing=\"$cellspacing\" cellpadding=\"$cellpadding\">\n";
    }
    
    private function addAttribs( $attr_ar ) {
        $str = '';
        foreach( $attr_ar as $key=>$val ) {
            $str .= " $key=\"$val\"";
        }
        return $str;
    }
    
    public function addRow($class = NULL, $attr_ar = array() ) {
        $row = new HTML_TableRow( $class, $attr_ar );
        array_push( $this->rows, $row );
    }
    
    public function addCell($data = '', $class = NULL, $type = 'data', $attr_ar = array() ) {
        $cell = new HTML_TableCell( $data, $class, $type, $attr_ar );
        // add new cell to current row's list of cells
        $curRow = &$this->rows[ count( $this->rows ) - 1 ]; // copy by reference
        array_push( $curRow->cells, $cell );
    }
    
    public function display() {
        foreach( $this->rows as $row ) {
            $this->tableStr .= !empty($row->class) ? "  <tr class=\"$row->class\"": "  <tr";
            $this->tableStr .= $this->addAttribs( $row->attr_ar ) . ">\n";
            $this->tableStr .= $this->getRowCells( $row->cells );
            $this->tableStr .= "  </tr>\n";
        }
        $this->tableStr .= "</table>\n";
        return $this->tableStr;
    }
    
    function getRowCells($cells) {
        $str = '';
        foreach( $cells as $cell ) {
            $tag = ($cell->type == 'data')? 'td': 'th';
            $str .= !empty($cell->class) ? "    <$tag class=\"$cell->class\"": "    <$tag";
            $str .= $this->addAttribs( $cell->attr_ar ) . ">";
            $str .= $cell->data;
            $str .= "</$tag>\n";
        }
        return $str;
    }
    
}


class HTML_TableRow {
    function __construct($class = NULL, $attr_ar = array()) {
        $this->class = $class;
        $this->attr_ar = $attr_ar;
        $this->cells = array();
    }
}

class HTML_TableCell {
    function __construct( $data, $class, $type, $attr_ar ) {
        $this->data = $data;
        $this->class = $class;
        $this->type = $type;
        $this->attr_ar = $attr_ar;
    }
}

?> 