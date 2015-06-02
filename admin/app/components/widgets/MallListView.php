<?php

/**
 * MallListView class file.
 *
 * The following is a piece of sample view code showing how to use MallListView
 * $this->createWidget('MallListView', array(
 *	   'dataProvider'=> dataprovider,
 *	   'itemView'    => PATH VIEW,
 *	 //'switch'      => 0:not use (default),1:phone,2:tablet
 *	 //'column'      => default as 2,
 *	 //'header'      => default as '',
 *   //'footer'      => default as '<hr>',
 *   //'end_footer'  => default as false (don't show footer at final item)
 *   //'separator'   => '<hr>',
 *	 //'template'    => "{items}\n{summary}\n{pager}",
 *   //'align'       => false
 *   //'swipe' => false
 *	 //'span_class'  => '',
 *   //'surroundItem' => true
 *   //'surroundItems' => true
 *	));
 */
class MallListView extends TbListView
{
	/** @var $column 列数 */
	public $column = 2;

	/** @var $header ヘッダー */
	public $header = '';

	/** @var $footer フッター */
	public $footer = '<hr>';

	/** @var span */
	public $span = '';

	/** $switch (0:not use,1:phone,2:tablet) Add direct Type Device */
	public $switch = 0;

	/** @var span_class more */
	public $span_class = '';

	/** @var end_footer */
	public $end_footer = false;

	/** @var align of outside div */
	public $align = false;

	/** swipe mode */
	public $swipe = false;

	/** @var surroundItem mode */
	public $surroundItem = true;

	/** @var surroundItems */
	public $surroundItems = true;

	/**
	 * Get html of The item
	 *
	 * @param String $view as itemView
	 * @param Array $data is array('data', 'index')
	 *
	 * @return html
	 */
	public function renderPartial($view, $data)
	{
		$html = '';

		ob_start();
		$this->owner->renderPartial($view, $data);
		$html = ob_get_contents();
		ob_end_clean();

		return $html;
	}

	/**
	 * Choose Device to display
	 *
	 * @return boolean (true is tablet, false is phone)
	 */
	private function switchDevice()
	{
		$tablet = user()->isTablet();

		/** 0: no use, 1: phone, 2:tablet */
		if ($this->switch !== 0){
			switch($this->switch){
				case 1:
					$tablet = false;
					break;
				case 2:
					$tablet = true;
					break;
				default:
					$tablet = false;
					;
					break;
			}
		}
		return $tablet;
	}

	/**
	 * Show the item
	 *
	 * @param Array $data : data of the item
	 * @param interger $index : position of the item
	 * @param String $view : view of the item
	 */
	private function showItem($data, $index, $view)
	{
		$tablet = $this->switchDevice();

		// Get Setting for ShowItem
		if ($tablet)
			$css = $this->htmlForTablet($index);
		else
			$css = $this->htmlForPhone();

		// Create HTML
		$widget = $this;
		$senddt = compact('data', 'index', 'widget');

		$html = '';

		// Add Header
		if ($css['tr_start']){
			$html .= $this->header;
		}

		// Add tag <td>
		if ($css['td_start']){
			$html .= '<div class="row-fluid" ' . ($this->align ? 'align="' . $this->align . '"' : '') . '>';
			if(!$this->swipe){
				if($this->surroundItem){
					$html .= '<div class="' . $this->span . '">';
				}else{
					$html .= '<div class="span12 s_padding">'; // Surrounding all item of a td
				}
			}
		}else if ($tablet){
			if(!$this->swipe && $this->surroundItem)
				$html .= '<div class="' . $this->span . '">';
		}

		// Add HTML of Item
		$html .= $this->renderPartial($view, $senddt);

		//Add padding
		$padding = $css['padding'];
		while ($padding--){
			if(!$this->swipe && $this->surroundItem)
				$html .= '</div>';
			$html .= '<div class="' . $this->span . '">';
		}

		// Add tag </td>
		if ($css['td_end']){
			if(!$this->swipe)
				$html .= '</div>';
			$html .= '</div>';
		}else if ($tablet){
			if(!$this->swipe && $this->surroundItem)
				$html .= '</div>';
		}

		// Add tag </tr>
		if ($css['tr_end']){
			if($this->end_footer === true){
				if($index == $this->dataProvider->getItemCount() - 1){
					$this->footer = '';
				}
			}
			$html .= $this->footer;
		}

		echo $html;
	}

	/**
	 * Create Setting for Tablet HTML
	 *
	 * @param int $index position of item
	 *
	 * @return array('tr_start','tr_end','td_start','td_end','padding')
	 */
	private function htmlForTablet($index)
	{
		$tr_start = false;
		$tr_end = false;
		$td_start = false;
		$td_end = false;
		$padding = 0;

		// span
		$this->span = sprintf('span%d %s', 12 / $this->column, $this->span_class);

		// このページ内のアイテム数
		$itemCount = $this->dataProvider->getItemCount();

		// パディング数を算出する
		if (($index + 1) == $itemCount){
			$padding = $this->column - ($index % $this->column) - 1;
		}

		if ($padding > 0){
			$td_end = true;
			$tr_end = true;
		}

		// td 開始、終了の判定
		if ($index % $this->column == 0){
			$tr_start = true;
			$td_start = true;
			if($this->column === 1) $td_end = true; // One colume tablet mode
		}else if ($index % $this->column == ($this->column - 1)){
			$tr_end = true;
			if($this->column === 1) $td_start = true; // One colume tablet mode
			$td_end = true;
		}
		return compact('tr_start', 'tr_end', 'td_start', 'td_end', 'padding');
	}

	/**
	 * Create Setting for Phone HTML
	 *
	 * @return array('tr_start','tr_end','td_start','td_end','padding')
	 */
	private function htmlForPhone()
	{
		$tr_start = true;
		$tr_end = true;
		$td_start = false;
		$td_end = false;
		$padding = 0;
		return compact('tr_start', 'tr_end', 'td_start', 'td_end', 'padding');
	}

	/**
	 * Modify Renders the data item list.
	 */
	public function renderItems()
	{
		if($this->surroundItems)
			echo CHtml::openTag($this->itemsTagName, array('class' => $this->itemsCssClass)) . "\n";
		$data = $this->dataProvider->getData();
		if (($n = count($data)) > 0){
			$j = 0;
			foreach($data as $i => $item){
				$this->showItem($item, $i, $this->itemView);
				if ($j++ < $n - 1)
					echo $this->separator;
			}
		}else
			$this->renderEmptyText();
		if($this->surroundItems)
			echo CHtml::closeTag($this->itemsTagName);
	}

	/**
	 * Override Renders the summary text.
	 */
	public function renderSummary($tag='div')
	{
		if(($count=$this->dataProvider->getItemCount())<=0)
			return;

		echo '<'.$tag.' class="'.$this->summaryCssClass.'">';
		if($this->enablePagination)
		{
			$pagination=$this->dataProvider->getPagination();
			$total=$this->dataProvider->getTotalItemCount();
			$start=$pagination->currentPage*$pagination->pageSize+1;
			$end=$start+$count-1;
			if($end>$total)
			{
				$end=$total;
				$start=$end-$count+1;
			}
			if(($summaryText=$this->summaryText)===null)
				$summaryText=Yii::t('zii','Displaying {start}-{end} of 1 result.|Displaying {start}-{end} of {count} results.',$total);
			echo strtr($summaryText,array(
				'{start}'=>$start,
				'{end}'=>$end,
				'{count}'=>$total,
				'{page}'=>$pagination->currentPage+1,
				'{pages}'=>$pagination->pageCount,
			));
		}
		else
		{
			if(($summaryText=$this->summaryText)===null)
				$summaryText=Yii::t('zii','Total 1 result.|Total {count} results.',$count);
			echo strtr($summaryText,array(
				'{count}'=>$count,
				'{start}'=>1,
				'{end}'=>$count,
				'{page}'=>1,
				'{pages}'=>1,
			));
		}
		echo '</'.$tag.'>';
	}
}
