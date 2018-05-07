function Pestanyas(){
	this.SelectedRow = "";
	this.NombreFicha = "";
	this.Class = "";
	this.ClassSel = "";
	
	this.Constructor = function (id,nombre,Class,ClassSel){
		this.NombreFicha = nombre;
		this.Class = Class;
		this.ClassSel = ClassSel;
		this.SelectedRow = 0;

		$("#"+this.NombreFicha+id).removeClass(this.Class);
		$("#"+this.NombreFicha+id).addClass(this.ClassSel);

		
	}
			
	this.SelectRow = function (id){
		//this.ShowDIV(id);
		//alert(id);
		
		$("#"+this.NombreFicha+this.SelectedRow).removeClass(this.ClassSel);
		$("#"+this.NombreFicha+this.SelectedRow).addClass(this.Class);
		
		$("#"+this.NombreFicha+id).removeClass(this.Class);
		$("#"+this.NombreFicha+id).addClass(this.ClassSel);
		this.SelectedRow = id;
	}
	
	this.ShowDIV = function (id){
		$("#DIV"+this.NombreFicha+this.SelectedRow).hide();	
		$("#DIV"+this.NombreFicha+id).show();
	}
}






