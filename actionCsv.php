<?
	public function actionCsv(){
		$criteria = Yii::app()->session['protocolo.criteria'];
		if (empty($criteria)) $this->redirect(array('index'));
		$models = Track::model()->findAll($criteria);
		
		$nome_arquivo = date('YmdHis');
		header("Content-type: application/vnd.ms-excel");
		header("Content-type: application/force-download");
		header("Content-Disposition: attachment; filename=$nome_arquivo.csv");
		header("Pragma: no-cache");

	  if (empty($models)) { 
		  echo 'Nenhuma informação para exportar';
		  return;
	  }