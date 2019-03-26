<?php

	namespace Packages\ecommerce\Models;

	class Tags{

		public function process($strReference,$arrParameters){

			$strOut = 'Unknown Ecommerce Tag: '.$strReference;

			switch($strReference){

				case 'basket':
					$strOut = $this->basket($arrParameters);
				break;

				case 'product':
					$strOut = $this->product($arrParameters);
				break;
			}

			return $strOut;
		}

		public function basket($arrParameters){

			return '<div class="basket">Basket Code</div>';
		}

		public function product($arrParameters){

			return '<div class="product">Product Code</div>';
		}
	}