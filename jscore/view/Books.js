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
			console.log()
			if(grid.getSelectionModel().selected.items.length === 0){
				Ext.Msg.alert('Ошибка', 'Для редактирвоания выберите книгу из списка', Ext.emptyFn);
			}
			else {
				let data = grid.getSelectionModel().selected.items[0].data;

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
										params  : {
											data: Ext.encode({book_id: data.book_id, book_name: form.getValues().book_name, author_name: form.getValues().author_name, book_year: form.getValues().book_year})
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
					listeners: {
						afterrender: function () {
							Ext.ComponentQuery.query('textfield[name=book_name]')[0].setValue(data.book_name);
							Ext.ComponentQuery.query('textfield[name=author_name]')[0].setValue(data.author_name);
							Ext.ComponentQuery.query('textfield[name=book_year]')[0].setValue(data.book_year);

						}
					}
				}).show();
			}


		}
	}, {
		text: 'Удалить',
		handler: function(remove) {
			let grid = remove.up('grid');
			let store = grid.getStore();
			if(grid.getSelectionModel().selected.items.length === 0){
				Ext.Msg.alert('Ошибка', 'Для удаления выберите книгу из списка', Ext.emptyFn);
			}
			else {
				let data = grid.getSelectionModel().selected.items[0].data;
				Ext.Ajax.request({
					method: 'POST',
					url: 'index.php/Book/removeBook',
					params: {
						data: Ext.encode({book_id: data.book_id})
					},
					success: function (response, opts) {
						let error = JSON.parse(response.responseText).error;
						let data = JSON.parse(opts.params.data);
						if (error) {

						} else {
							let grid = remove.up('grid');
							let store = grid.getStore();
							store.load(data);
							grid.update();
						}
					},
					failure: function () {
					}
				});
			}
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
					let xml = response.responseText;

					Ext.create('Ext.window.Window', {
						title: 'XML книги',
						height: 500,
						width: 800,
						layout: 'fit',
						items:{
							xtype     : 'textareafield',
							grow      : true,
							name      : 'xml',
							fieldLabel: 'XML',
							anchor    : '100%',
							value: formatXml(xml)
						}
					}).show();

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

function formatXml (xml) {
	var reg = /(>)\s*(<)(\/*)/g; // updated Mar 30, 2015
	var wsexp = / *(.*) +\n/g;
	var contexp = /(<.+>)(.+\n)/g;
	xml = xml.replace(reg, '$1\n$2$3').replace(wsexp, '$1\n').replace(contexp, '$1\n$2');
	var pad = 0;
	var formatted = '';
	var lines = xml.split('\n');
	var indent = 0;
	var lastType = 'other';
	// 4 types of tags - single, closing, opening, other (text, doctype, comment) - 4*4 = 16 transitions
	var transitions = {
		'single->single': 0,
		'single->closing': -1,
		'single->opening': 0,
		'single->other': 0,
		'closing->single': 0,
		'closing->closing': -1,
		'closing->opening': 0,
		'closing->other': 0,
		'opening->single': 1,
		'opening->closing': 0,
		'opening->opening': 1,
		'opening->other': 1,
		'other->single': 0,
		'other->closing': -1,
		'other->opening': 0,
		'other->other': 0
	};

	for (var i = 0; i < lines.length; i++) {
		var ln = lines[i];

		// Luca Viggiani 2017-07-03: handle optional <?xml ... ?> declaration
		if (ln.match(/\s*<\?xml/)) {
			formatted += ln + "\n";
			continue;
		}
		// ---

		var single = Boolean(ln.match(/<.+\/>/)); // is this line a single tag? ex. <br />
		var closing = Boolean(ln.match(/<\/.+>/)); // is this a closing tag? ex. </a>
		var opening = Boolean(ln.match(/<[^!].*>/)); // is this even a tag (that's not <!something>)
		var type = single ? 'single' : closing ? 'closing' : opening ? 'opening' : 'other';
		var fromTo = lastType + '->' + type;
		lastType = type;
		var padding = '';

		indent += transitions[fromTo];
		for (var j = 0; j < indent; j++) {
			padding += '\t';
		}
		if (fromTo == 'opening->closing')
			formatted = formatted.substr(0, formatted.length - 1) + ln + '\n'; // substr removes line break (\n) from prev loop
		else
			formatted += padding + ln + '\n';
	}

	return formatted;
};