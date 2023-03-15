(function ($, root, undefined) {
	$(function () {

		var Shuffle = window.Shuffle;

		class post_filter {
		  	constructor(element) {
			    this.element = element;
			    this.shuffle = new Shuffle(element, {
			      	itemSelector: '.news_wrap',
			      	filterMode: Shuffle.FilterMode.ALL,
			      	// sizer: element.querySelector('.my-sizer-element'),
			    });

			    // Log events.
			    this.addShuffleEventListeners();
			    this._activeFilters = [];
			    this.addFilterButtons();
			    this.addSearchFilter();
			    this.addFilterSelect();
			    this.clearFilter();
		  	}

		  	/**
			* Shuffle uses the CustomEvent constructor to dispatch events. You can listen
			* for them like you normally would (with jQuery for example).
			*/

		  	addShuffleEventListeners() {
			    this.shuffle.on(Shuffle.EventType.LAYOUT, function(data){
			      //console.log('layout. data:', data);
			    });
			    this.shuffle.on(Shuffle.EventType.REMOVED, function(data){
			      //console.log('removed. data:', data);
			    });
		  	}

		  	addFilterButtons() {
			    let options = document.querySelectorAll('.filter_btn_js');

			   	options.forEach((option) => {
				    if (!option) {
				      return;
				    }
				    
				    const filterButtons = Array.from(option.children);
				    const onClick = this._handleFilterClick.bind(this);
				    filterButtons.forEach((button) => {
				      button.addEventListener('click', onClick, false);
				    });
				});
		  	}

		  	_handleFilterClick(evt) {
			    const btn = evt.currentTarget;
			    const isActive = btn.classList.contains('active_term');
			    const isData = btn.classList.contains('data_term');
			    const btnGroup = btn.getAttribute('data-group');
			    
			    //this._removeActiveClassFromChildren();
			    this._activeScrollLoad();
			    let filterGroup = this._activeFilters;

			    if (isActive) {
			      btn.classList.remove('active_term');
			      var index = filterGroup.indexOf(btnGroup);
			      if (index > -1) {
			      	filterGroup.splice(index, 1);
			      }
			      if (filterGroup.length == 0) {
			      	filterGroup = Shuffle.ALL_ITEMS;
			      }

			    } else {
			      //filterGroup = btnGroup;
			      if(isData){

			      	let btnsData = btn.closest('.terms_wrap').querySelectorAll('.data_term');

			      	btnsData.forEach((el)=>{
			      		if(el.classList.contains('active_term')){
			      			el.classList.remove('active_term');
			      		}
			      	});

			      	if (filterGroup.length > 0) {
				      	filterGroup.forEach((el,key) => {
				      		if(el.includes("data")){
				      			filterGroup.splice(key, 1);
				      		}
				      	});
				    }
			      }
			      btn.classList.add('active_term');
			      filterGroup.push(btnGroup);
			    }

			    if( filterGroup == 'all' ){
			    	filterGroup = [];
			    }

			    this._activeFilters = filterGroup;
			    this.shuffle.filter(filterGroup);
		  	}

		  	addFilterSelect() {
			    let options = document.querySelectorAll('.filter_select_js');

			   	options.forEach((option) => {
				    if (!option) {
				      return;
				    }
				    
				    const filterButtons = Array.from(option.children);
				    const onClick = this._handleFilterChangeSelect.bind(this);
				    filterButtons.forEach((button) => {
				      button.addEventListener('click', onClick, false);
				      
				    });
				});
		  	}

		  	_handleFilterChangeSelect(evt) {
			    const btn = evt.currentTarget;
			    const isActive = btn.classList.contains('active_term');
			    const btnGroup = btn.getAttribute('data-group');
			    
			    const selectActive = this._removeActiveClassFromChildren();


			    
			    this._activeScrollLoad();
			    let filterGroup = this._activeFilters;

			    if (isActive) {
			      btn.classList.remove('active_term');
			      var index = filterGroup.indexOf(btnGroup);
			      if (index > -1) {
			      	filterGroup.splice(index, 1);
			      }
			      if (filterGroup.length == 0) {
			      	filterGroup = Shuffle.ALL_ITEMS;
			      }
				} else {
				  var index = filterGroup.indexOf(selectActive);
				  if (index > -1) {
						filterGroup.splice(index, 1);
				  }

				  btn.classList.add('active_term');
				  // console.log(btnGroup);
				  // console.log('all_advisors');
				  // console.log(selectActive !='all_advisors');

				  if (btnGroup !='all_advisors') {
				      filterGroup.push(btnGroup);
				  }
			      //filterGroup = btnGroup;
			    }
				  //console.log(filterGroup);
			    

			    if( filterGroup == 'all' ){
			    	filterGroup = [];
			    }
			    this._activeFilters = filterGroup;
			    this.shuffle.filter(filterGroup);
		  	}

		  	_removeActiveClassFromChildren(parent) {
		  		let options = document.querySelectorAll('.filter_select_js');
		  		let self = this;
		  		let active = document.querySelector('.filter_select_js .active_term');
		  		let activeVal = '0';
			    if(active != null){
			    	activeVal = active.getAttribute('data-group');
			    }
		  		options.forEach((option) => {
		  			const filterButtons = Array.from(option.children);

		  			filterButtons.forEach((button) => {
					    button.classList.remove('active_term');
				    });
		  		});
		  		// if (active != 'none') {
		  		// 	activeVal = active.getAttribute('data-group')
		  		// }
		  		return activeVal;
		  	}


		  	// Advanced filtering
		  	addSearchFilter() {
			    const searchInput = document.querySelector('#search_post_ins');
			    const clear_input = document.querySelector('.clear_input');

			    if (!searchInput) {
			      return;
			    }
			    searchInput.addEventListener('input', this._handleSearchKeyup.bind(this));
		  	}

		  	/**
		   	* Filter the shuffle instance by items with a title that matches the search input.
		   	* @param {Event} evt Event object.
		   	*/
		  	_handleSearchKeyup(evt) {
		  		const item = evt.currentTarget;
		    	const searchText = evt.target.value.toLowerCase();
		    	var btns = document.querySelectorAll('.single_term');

		    	btns.forEach((btn) => {
		  			const isActive = btn.classList.contains('active_term');
			    	if (isActive) {
				      btn.classList.remove('active_term');
				    }
		  		});
		    	
			    this.shuffle.filter((element, shuffle) => {
			      	// If there is a current filter applied, ignore elements that don't match it.
			      	if (shuffle.group !== Shuffle.ALL_ITEMS) {
				        // Get the item's groups.
				        const groups = JSON.parse(element.getAttribute('data-groups'));
				        const isElementInCurrentGroup = groups.indexOf(shuffle.group) !== -1;
				        // Only search elements in the current group
				        if (!isElementInCurrentGroup) {
				          return false;
				        }
			      	}
			      	const titleElement = element.querySelector('.news_item .title');
			      	const titleText = titleElement.textContent.toLowerCase().trim();
			      	return titleText.indexOf(searchText) !== -1;
			    });
		  	}

		  	_activeScrollLoad(evt){
				let options = document.querySelectorAll('.news_item');

		  		options.forEach((option) => {
		  			option.classList.add('start_anim');
		  			let img = option.querySelector('.lazyBg')
		  			lazyBg($(img));
		  			
		  		});
		  	}

		  	clearFilter(){
		  		const onClick = this._handleClearFilter.bind(this);
		  		document.querySelector('.clear_input').addEventListener('click', onClick, false);
		  	}

		  	_handleClearFilter(evt) {
		  		$('#search_post_ins').val('').trigger("input");
		  		$('#search_post_ins').blur();
		  		let filterGroup = [];
		  		this.shuffle.filter(filterGroup);
		  	}
		}

		window.demo = new post_filter(document.getElementById('grid'));


		//clear input
		// $('.clear_input').on('click', function(){ 
		// 	$('#search_post_ins').val('').trigger("input");
		// 	$('#search_post_ins').keydown();
		//     $('#search_post_ins').keypress();
		//     $('#search_post_ins').keyup();
		// 	$('#search_post_ins').blur();
		// });

	});
})(jQuery, this);