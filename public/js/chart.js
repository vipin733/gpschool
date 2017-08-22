Vue.component('step-navigation-step', {
    template: '#step-navigation-step-template',
    
    props: ['step', 'currentstep'],
    
    computed: {
        indicatorclass: function() {
            return {
                'active': (this.step.id == this.currentstep),
                'complete': (this.currentstep > this.step.id)
            }
        }
    }
});

Vue.component('step-navigation', {
    template: '#step-navigation-template',
    
    props: ['steps', 'currentstep']
});
              
Vue.component('step', {
    template: '#step-template',
    
    props: ['step', 'stepcount', 'currentstep'],
    
    computed: {
        active: function() {
            return (this.step.id == this.currentstep)
        },
        
        firststep: function() {
            return (this.currentstep == 1)
        },
        
        laststep: function() {
            return (this.currentstep == this.stepcount)
        }
    },
    
    methods: {
        nextStep: function() {
            this.$dispatch('step-change', ++this.currentstep)
        },
        
        lastStep: function() {
            this.$dispatch('step-change', --this.currentstep)
        }
    }
});

new Vue({
    el: '#app',
    
    data: {
        currentstep: 1,
        
        steps: [
            { 
                id: 1, 
                title: 'Position', 
                icon_class: "fa fa-map-marker" 
            }, { 
                id: 2, 
                title: 'Category', 
                icon_class: "fa fa-folder-open" 
            }, { 
                id: 3, 
                title: 'Send', 
                icon_class: "fa fa-paper-plane" 
            }
        ]
    },
    
    methods: {
        stepChanged: function(step) {
            this.currentstep = step;
        }
    }
});