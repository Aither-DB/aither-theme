(function ($, root, undefined) {
	$(function () {

		var Shuffle = window.Shuffle;

		class post_filter {
		  	constructor(element) {
			    this.element = element;
			    this.shuffle = new Shuffle(element, {
			      	itemSelector: '.single_post_wrap',
			      	filterMode: Shuffle.FilterMode.ALL,
			      	// sizer: element.querySelector('.my-sizer-element'),
			    });

			    // Log events.
			    this.addShuffleEventListeners();
			    this._activeFilters = [];
			    this.addFilterButtons();
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
			    let options = document.querySelectorAll('.terms_wrap');

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
			    const isRole = btn.classList.contains('term_role');
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
			    	if(isRole){
				      	let btnsData = btn.closest('.terms_wrap').querySelectorAll('.term_role');

				      	btnsData.forEach((el)=>{
				      		if(el.classList.contains('active_term')){
				      			el.classList.remove('active_term');
				      		}
				      	});

				      	if (filterGroup.length > 0) {
					      	filterGroup.forEach((el,key) => {
					      		if(el.includes("role")){
					      			filterGroup.splice(key, 1);
					      		}
					      	});
					    }
			      	}
			     	btn.classList.add('active_term');
			      	filterGroup.push(btnGroup);
			      	//filterGroup = btnGroup;
			    }

			    if( filterGroup == 'all' ){
			    	filterGroup = [];
			    }

			    this._activeFilters = filterGroup;
			    this.shuffle.filter(filterGroup);
		  	}

		  	_removeActiveClassFromChildren(parent) {
		  		let options = document.querySelectorAll('.terms_wrap');

		  		options.forEach((option) => {
		  			const filterButtons = Array.from(option.children);

		  			filterButtons.forEach((button) => {
				      button.classList.remove('active_term');
				    });
		  		});
		  	}

		  	_activeScrollLoad(evt){
				let options = document.querySelectorAll('.single_post');

		  		options.forEach((option) => {
		  			option.classList.add('start_anim');
		  			let img = option.querySelector('.lazyBg')
		  			lazyBg($(img));
		  			
		  		});
		  	}

		}

		
		window.demo = new post_filter(document.getElementById('grid'));
		

	});
})(jQuery, this);