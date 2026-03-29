<?php

class Pagination {
    private $totalItems;
    private $itemsPerPage;
    private $currentPage;
    
    public function __construct($totalItems, $itemsPerPage = 10, $currentPage = 1) {
        $this->totalItems = $totalItems;
        $this->itemsPerPage = $itemsPerPage;
        $this->currentPage = max($currentPage, 1);
    }
    
    public function getTotalPages() {
        return ceil($this->totalItems / $this->itemsPerPage);
    }
    
    public function getOffset() {
        return ($this->currentPage - 1) * $this->itemsPerPage;
    }
    
    public function getLimit() {
        return $this->itemsPerPage;
    }
    
    public function getCurrentPage() {
        return $this->currentPage;
    }
    
    public function hasPrevious() {
        return $this->currentPage > 1;
    }
    
    public function hasNext() {
        return $this->currentPage < $this->getTotalPages();
    }
    
    public function getPreviousPage() {
        return $this->currentPage - 1;
    }
    
    public function getNextPage() {
        return $this->currentPage + 1;
    }
    
    public function render($baseUrl) {
        $html = '<nav aria-label="Page navigation"><ul class="pagination">';
        
        // Previous button
        if ($this->hasPrevious()) {
            $html .= '<li class="page-item"><a class="page-link" href="' . $baseUrl . '?page=' . $this->getPreviousPage() . '">Précédent</a></li>';
        } else {
            $html .= '<li class="page-item disabled"><span class="page-link">Précédent</span></li>';
        }
        
        // Page numbers
        for ($i = 1; $i <= $this->getTotalPages(); $i++) {
            $active = $i === $this->currentPage ? 'active' : '';
            $html .= '<li class="page-item ' . $active . '"><a class="page-link" href="' . $baseUrl . '?page=' . $i . '">' . $i . '</a></li>';
        }
        
        // Next button
        if ($this->hasNext()) {
            $html .= '<li class="page-item"><a class="page-link" href="' . $baseUrl . '?page=' . $this->getNextPage() . '">Suivant</a></li>';
        } else {
            $html .= '<li class="page-item disabled"><span class="page-link">Suivant</span></li>';
        }
        
        $html .= '</ul></nav>';
        
        return $html;
    }
}
