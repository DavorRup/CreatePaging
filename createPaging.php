public function createPaging($currentPage, $allPages, $link) {
	$limitActivePages = 7;
	$keyChange = floor($limitActivePages/2);
	
	$pagingArray = array();
	
	$pagingArray['currentPage'] = $currentPage;
	$pagingArray['allPages'] = $allPages;
	
	$pagingArray['pages'] = array();
	
	// Pages
	if($allPages > 1) {
		if($allPages > $limitActivePages) {
			if($currentPage > $keyChange) {
				if(($currentPage + $keyChange) < $allPages) {
					$startPaging = $currentPage - $keyChange;
					$endPaging = $currentPage + $keyChange;
				} else {
					$startPaging = $allPages - ($limitActivePages - 1);
					$endPaging = $allPages;
				}
			} else {
				$startPaging = 1;
				$endPaging = $limitActivePages;
			}
		} else {
			$startPaging = 1;
			$endPaging = $allPages;
		}
		
		for($startPaging; $startPaging <= $endPaging; $startPaging++){
			$pagingArray['pages'][$startPaging] = array(
				'label' => $startPaging,
				'link' => $link.$startPaging
			);
		}
	}
	
	// Previous page
	$pagingArray['buttons']['previous'] = array(
			'label' => 'previous',
			'link' => $link.($currentPage > 1 ? $currentPage - 1 : 1)
	);
	
	// Next page
	$pagingArray['buttons']['next'] = array(
			'label' => 'next',
			'link' => $link.($currentPage <= ($allPages-1) ? $currentPage + 1 : $allPages)
	);
	
	return $pagingArray;
}