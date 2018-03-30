 <?php
 class SearchController extends PageController {

    protected function handle($params) {
    	$param = array();

    	$type = $_GET['type'];
    	if ($type=='package') {
    		$param['btn1style'] = 'background-color: #ffca59';
    		$param['btn2style'] = '';
    		$param['labelstyle'] = 'background-color: #ffca59';
    		$param['labeltext'] = 'Sending packages has never been so timely and affordable!';
    		$param['divstyle'] = 'border: solid 3px #ffca59';
    	} else if ($type=='trip') {
    		$param['btn1style'] = '';
    		$param['btn2style'] = 'background-color: #11859e';
    		$param['labelstyle'] = 'background-color: #11859e;color:white';
    		$param['labeltext'] = 'Earn money with your unused luggage space on your next travel!';
    		$param['divstyle'] = 'border: solid 3px #11859e';
    	} else {}

    	$locale = $this->getLocale(true);
    	$param['depart'] = CmsItemQuery::getCodeContent($_GET['depart'], $locale);
    	$param['arrive'] = CmsItemQuery::getCodeContent($_GET['arrive'], $locale);

    	$param['date'] = $_GET['date'];
    	$param['space'] = $_GET['space']=='whole' ? 'Whole Luggage' : 'Space in a Luggage';
    	$param['weight'] = $_GET['weight'];

        View::addJs('search.js');
        View::addCss('generic.css');

        View::factory('generic/search', $param);
    }
}