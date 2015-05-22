<?php

	// (User-inputted) Data Class
	class Data {
		
		// Data fields to validate
		protected $data;
		protected $type;
		protected $minlen;
		protected $maxlen;
		
		// Constructor: input data and type
		function __construct($data, $type, $minlen, $maxlen) {
			
			$this->data = $data;
			$this->type = $type;
			$this->minlen = $minlen;
			$this->maxlen = $maxlen;
		
		}
		
		// Validate data (or convert it)
		function val() {
			
			// Check length
			if(count($this->data) < $this->minlen || count($this->data) > $this->maxlen)
				return false;
			
			switch($this->type) {
				
				// Username cannot have special characters (only a-zA-Z0-9_.)
				case "user":
					if(preg_match("/[^a-zA-Z0-9_\.]/", $this->data))
						return false;
					return true;
					
				// Password must have some special characters (not encoded, will be hashed)
				case "pass":
					if(
						!preg_match("/[a-zA-Z]/", $this->data) &&	// need a letter
						!preg_match("/[0-9]/", $this->data)	&&		// need a number
						!preg_match("/[^a-zA-Z0-9]/", $this->data)	// need a special character
					)
						return false;
					return true;
					
				// Text special characters will be converted to entities
				case "text":
				default:
					// This might return something different than the original (unlike for text and password). It will never return false.
					// This can be used for any text (including other languages?).
					return $this->data = htmlentities($this->data);
				
			}
			
		}

	}
?>