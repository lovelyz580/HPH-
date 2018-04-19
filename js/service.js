angular.module('service', [])
    .factory('$$compute', [function() {
        return {
            math: function(p) {
                return 3.14 * p * p;
            }
        };
    }])
    .service('$$cpt', [function() {
        this.zc = function(r) {
            return 2 * r * 3.14;
        }
    }])
