/**
 * Список книг
 */
Ext.define('Swan.view.Books', {
	extend: 'Ext.grid.Panel',
	name: 'grid',
	store: {
		proxy: {
			type: 'ajax',
			url: 'index.php/Book/loadList',
			reader: {
				type: 'json',
				idProperty: 'book_id'
			}
		},
		autoLoad: true,
		remoteSort: false,
		sorters: [{
			property: 'book_name',
			direction: 'ASC'
		}]
	},
	defaultListenerScope: true,
	tbar: [{
		text: 'Добавить',

		handler: function(add) {
			// todo надо реализовать добавление
			Ext.create('Ext.window.Window', {
				title: 'Добавить новую книгу',
				height: 240,
				width: 400,
				layout: 'fit',
				items:{
					xtype: 'form',
					bodyPadding: 5,
					layout: {
						type: 'vbox',
						align: 'stretch'
					},
					defaults: {
						anchor: '100%',
						xtype: 'textfield',
						blankText: 'This is required',
						labelWidth: 90
					},
					items: [
						{
							xtype: 'textfield',
							name: 'book_name',
							fieldLabel: 'Название книги',
							allowBlank: false
						},
						{
							xtype: 'textfield',
							name: 'author_name',
							fieldLabel: 'Автор книги',
							allowBlank: false
						},
						{
							xtype: 'yearspinner',
							name: 'book_year',
							fieldLabel: 'Год издания',
							value: 2020,
							step: 1
						},
						{
							xtype: 'button',
							text: 'Добавить книгу',
							itemId: 'addBook',
							padding: 10,
							handler: function (target) {
								var form = this.up('form').getForm();
								Ext.Ajax.request({
									method: 'POST',
									url: 'index.php/Book/addBook',
									headers: { 'Content-Type': 'application/json' },
									params  : {
										data: Ext.encode(form.getValues())
									},
									success: function(response, opts) {
										let error = JSON.parse(response.responseText).error;
										let data = JSON.parse(opts.params.data);
										if(error){

										}
										else {
											let win = target.up('window');
											let grid = add.up('grid');
											let store = grid.getStore();
											store.load(data);
											grid.update();
											win.close();
										}
									},
									failure: function() {
									}
								});
							}
						}
					]
				},
				closeWindow: function () {
					this.up('window').close();
				}
			}).show();
		}
	}, {
		text: 'Редактировать',
		handler: function(update) {
			let grid = update.up('grid');
			let store = grid.getStore();
			let data = Ext.pluck(store.data.items, 'data');
			Ext.create('Ext.window.Window', {
				title: 'Редактировать книгу',
				height: 280,
				width: 400,
				layout: 'fit',
				items:{
					xtype: 'form',
					bodyPadding: 5,
					layout: {
						type: 'vbox',
						align: 'stretch'
					},
					defaults: {
						anchor: '100%',
						xtype: 'textfield',
						blankText: 'This is required',
						labelWidth: 90
					},
					items: [
						{
							xtype: 'combobox',
							name: 'book_id',
							fieldLabel: 'Выберите книгу',
							store: store,
							queryMode: 'local',
							displayField: 'book_name',
							valueField: 'book_id',
							placeHolder: 'Выберите книгу',
							listeners: {
								select: function(combo, record, eOpts){
									Ext.ComponentQuery.query('textfield[name="book_name"]')[0].setValue(record.data.book_name);
									Ext.ComponentQuery.query('textfield[name="author_name"]')[0].setValue(record.data.author_name);
									Ext.ComponentQuery.query('textfield[name="book_year"]')[0].setValue(record.data.book_year);
								}
							}
						},
						{
							xtype: 'textfield',
							name: 'book_name',
							fieldLabel: 'Название книги',
							allowBlank: false
						},
						{
							xtype: 'textfield',
							name: 'author_name',
							fieldLabel: 'Автор книги',
							allowBlank: false
						},
						{
							xtype: 'yearspinner',
							name: 'book_year',
							fieldLabel: 'Год издания',
							step: 1
						},
						{
							xtype: 'button',
							text: 'Сохранить',
							itemId: 'saveBook',
							padding: 10,
							handler: function (target) {
								var form = this.up('form').getForm();
								Ext.Ajax.request({
									method: 'POST',
									url: 'index.php/Book/updateBook',
									headers: { 'Content-Type': 'application/json' },
									params  : {
										data: Ext.encode(form.getValues())
									},
									success: function(response, opts) {
										let error = JSON.parse(response.responseText).error;
										let data = JSON.parse(opts.params.data);
										if(error){

										}
										else {
											let win = target.up('window');
											let grid = update.up('grid');
											let store = grid.getStore();
											store.load(data);
											grid.update();
											win.close();
										}
									},
									failure: function() {
									}
								});
							}
						}
					]
				},
				closeWindow: function () {
					this.up('window').close();
				}
			}).show();

		}
	}, {
		text: 'Удалить',
		handler: function(remove) {
			let grid = remove.up('grid');
			let store = grid.getStore();
			let data = Ext.pluck(store.data.items, 'data');
			Ext.create('Ext.window.Window', {
				title: 'Удалить книгу',
				height: 150,
				width: 400,
				layout: 'fit',
				items:{
					xtype: 'form',
					bodyPadding: 5,
					layout: {
						type: 'vbox',
						align: 'stretch'
					},
					defaults: {
						anchor: '100%',
						xtype: 'textfield',
						blankText: 'This is required',
						labelWidth: 90
					},
					items: [
						{
							xtype: 'combobox',
							name: 'book_id',
							fieldLabel: 'Выберите книгу',
							store: store,
							queryMode: 'local',
							displayField: 'book_name',
							valueField: 'book_id',
							placeHolder: 'Выберите книгу',
							listeners: {

							}
						},
						{
							xtype: 'button',
							text: 'Удалить книгу',
							itemId: 'removeBook',
							padding: 10,
							handler: function (target) {
								var form = this.up('form').getForm();
								Ext.Ajax.request({
									method: 'POST',
									url: 'index.php/Book/removeBook',
									headers: { 'Content-Type': 'application/json' },
									params  : {
										data: Ext.encode(form.getValues())
									},
									success: function(response, opts) {
										let error = JSON.parse(response.responseText).error;
										let data = JSON.parse(opts.params.data);
										if(error){

										}
										else {
											let win = target.up('window');
											let grid = remove.up('grid');
											let store = grid.getStore();
											store.load(data);
											grid.update();
											win.close();
										}
									},
									failure: function() {
									}
								});
							}
						}
					]
				},
				closeWindow: function () {
					this.up('window').close();
				}
			}).show();
		}
	}, {
		text: 'Экспорт в XML',
		handler: function() {
			Ext.Ajax.request({
				method: 'POST',
				url: 'index.php/Book/generateXML',
				params  : {
					data: Ext.encode()
				},
				success: function(response, opts) {

				},
				failure: function() {
				}
			});
		}
	}],
	columns: [{
		dataIndex: 'author_name',
		text: 'Автор',
		width: 150
	}, {
		dataIndex: 'book_name',
		text: 'Название книги',
		flex: 1
	}, {
		dataIndex: 'book_year',
		text: 'Год издания',
		width: 150
	}]
});

Ext.define('Ext.ux.YearSpinner', {
	extend: 'Ext.form.field.Spinner',
	alias: 'widget.yearspinner',

	onSpinUp: function() {
		var spinner = this;
		if (!spinner.readOnly) {
			var val = parseInt(spinner.getValue().split(' '), 10)||0;
			spinner.setValue(val + spinner.step);
		}
	},

	onSpinDown: function() {
		var spinner = this;
		if (!spinner.readOnly) {
			var val = parseInt(spinner.getValue().split(' '), 10)||0;
			if (val <= spinner.step) {
				spinner.setValue('Oooooooooooops');
			} else {
				spinner.setValue((val - spinner.step));
			}
		}
	}
});
