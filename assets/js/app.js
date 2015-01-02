

var app = {};

app.carro =  Backbone.Model.extend({});

app.carros = Backbone.Collection.extend({
	model : app.carro,
	url   : '/modelos'
});


app.carView =   Backbone.View.extend(
	{
		className:'class', 
		tagName:'div', 
		template: _.template($('#car-template').html()),
		
		render : function () {
			var data = this.model.toJSON();
			var html = this.template(data);
			this.$el.html( html );
	}

});


var cars = new app.carros(); //creando el modelo, hasta aquí funciona bien Renecito
cars.on('add', function (model){
	var view = new app.carView({model:model});
	view.render();
	$('#carros').prepend(view.$el.fadeIn());
});

cars.fetch();