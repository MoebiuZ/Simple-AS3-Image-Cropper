package {
	import flash.display.MovieClip;
	
	import flash.events.MouseEvent;
	import flash.events.*;
	import flash.net.*;
	
	
	public class ImagenEditor extends MovieClip {
		
				
		public function ImagenEditor() {
			
			this.addEventListener(Event.ADDED_TO_STAGE, _inicializar);
			//(root as Object).dispatcher.addEventListener("reajustar", _reajustar);
			
		}  // function Editor
		
		
		private function _inicializar(evt:Event):void {
			this.removeEventListener(Event.ADDED_TO_STAGE, _inicializar);
//			this.addEventListener(Event.REMOVED_FROM_STAGE, _clean);
			
			this.addEventListener(MouseEvent.MOUSE_DOWN, _startDrag);
			this.addEventListener(MouseEvent.MOUSE_UP, _stopDrag);
			this.addEventListener(MouseEvent.MOUSE_OUT, _stopDrag);
			

								
			_reajustar(null);
		} // function _inicializar
		
		
		
		private function _startDrag(evt:MouseEvent):void {
			this.startDrag();
		} // function _startDrag()
		
		
		private function _stopDrag(evt:MouseEvent):void {
			this.stopDrag();
		} // function _stopDrag
		
		

		
		
		protected function _reajustar(evt:Event):void {

			

		} // function _reajustar
		
				
		
		
	} // class
} // package