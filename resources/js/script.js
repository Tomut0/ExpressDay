$(() => {
	class Cart {

		// Инициализируем переменные и методы
		_Initialize() {
			const d = document,
				amountContainers = d.querySelectorAll(".card>.row input.amount"),
				adds = d.querySelectorAll(".card>.row i.fa-plus"),
				minuses = d.querySelectorAll(".card>.row i.fa-minus"),
				prices = d.querySelectorAll(".card>.row p.price");

			 // Отмена закрытия окошка
			$(".dropdown-menu").on('click', () => {$('.dropdown-item-text').dropdown('dispose')});

			// Запускаем методы
			this.Events(amountContainers, adds, minuses, prices);
		}

		Events(amountContainers, adds, minuses, prices) {
			let IncMode = null, counterList = [];

			// Управление сессиями
			function SessionController(n, item) {
				switch(n) {
					case "isSession":
						return localStorage.getItem("session") ? true : false;
						break;
					case "setItem":
						return localStorage.setItem("session", item);
						break;
					case "getItem":
						return localStorage.getItem("session");
						break;
					case "Clear":
						return localStorage.clear();
						break;
				}
			}

			// Создаём счётчик-массив, возвращаем исходное значение
			function CreateCounter(quanity) { 
				counterList.push(quanity);
				UpdateTotal();
        		return quanity;
			}

			// Всё, что связанно с обновлением счётчика
			function UpdateCounter(event, id, quanity = 1) {
				let target = event.target.parentElement.children[2];
				counterList[id] = +counterList[id];

				if ((counterList[id] + quanity) >= 1 && (counterList[id] + quanity) < 999) {
					target.value = counterList[id] += quanity;
				} else {
					target.value = counterList[id] = 999;
				}
			}

			// Обновление итоговой суммы
			function UpdateTotal() {

				// Перебираем все ценники и устанавливаем значение итоговой суммы

				prices.forEach((item, id) => {
            		let price = parseInt(item.textContent.replace('Р', ''));
            		$(".total").html("Итого: " + price * counterList[id] + "Р");
        		});
			}

			// Если нажали шифт
			$('body').on('keydown', key => {
				if (key.keyCode === 16) {
            		IncMode = true;
            		SessionController("Clear");
        		}
			});

			// Если отпустили шифт
			$('body').on('keyup', key => {
				if (key.keyCode === 16) {
            		IncMode = false;
        		}
			});

			// Перебираем контейнеры количества товаров, указываем события
			amountContainers.forEach((item, id) => {
				if (SessionController("isSession")) {
					item.value = SessionController("getItem");
					console.log('123');
				} else {
					item.value = CreateCounter(1);
					SessionController("setItem", item.value);
				}

				$(item).on('click', () => {
       		    	item.value = null;
       		    	counterList[id] = "";
       		    	UpdateTotal();
       			});

       			$(item).on('keyup', (e) => {

            		if (isFinite(e.key)) {
                		counterList[id] += e.key;
            		} else if (e.keyCode === 8) {
                		counterList[id] = counterList[id].slice(0, -1);
            		}

            		UpdateTotal();
        		});
			});

			// Перебираем "плюсы" и запускаем функцию обновления счётчика
			adds.forEach((item, id) => {
				$(item).on('click', event => {
					IncMode ? UpdateCounter(event, id, 20) : UpdateCounter(event, id);
					UpdateTotal();
				});
			});

			// Перебираем "минусы" и запускаем функцию обновления счётчика
			minuses.forEach((item, id) => {
				$(item).on('click', event => {
					if (IncMode && (counterList[id] - 20 > 1)) {
						UpdateCounter(event, id, -20);
					} else if (!IncMode) {
						UpdateCounter(event, id, -1);
					} else UpdateCounter(event, id, -counterList[id] + 1);

					UpdateTotal();
				});
			});
		}
	}

	// Инициализируем скрипт
	let cart = new Cart();
	cart._Initialize();
});