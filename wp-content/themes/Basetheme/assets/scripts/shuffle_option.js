var Exports = {
    Modules: {}
};
Exports.Modules.Gallery = (function($, undefined) {
    var $grid,
        $shapes,
        $services,
        shapes = [],
        services = [],
        // Using shuffle with specific column widths
        columnWidths = {
            1170: 70,
            940: 60,
            724: 42
        },
        gutterWidths = {
            1170: 30,
            940: 20,
            724: 20
        },
        init = function() {
            setVars();
            initFilters();
            initShuffle();
        },
        setVars = function() {
            $grid = $('#work');
            $services = $('.filter-service');
        },
        initShuffle = function() {
            // instantiate the plugin
            $grid.shuffle({
                speed: 250,
                easing: 'cubic-bezier(0.165, 0.840, 0.440, 1.000)', // easeOutQuart
                columnWidth: function(containerWidth) {
                    var colW = columnWidths[containerWidth];
                    // Default to container width
                    if (colW === undefined) {
                        colW = containerWidth;
                    }
                    return colW;
                },
                gutterWidth: function(containerWidth) {
                    var gutter = gutterWidths[containerWidth];
                    // Default to zero
                    if (gutter === undefined) {
                        gutter = 0;
                    }
                    return gutter;
                }
            });
        };
    initFilters = function() {
            $services.find('button').on('click', function() {
                var $this = $(this),
                    $alreadyChecked,
                    checked = [],
                    active = 'active',
                    isActive;
                // Already checked buttons which are not this one
                $alreadyChecked = $this.siblings('.' + active);
                $this.toggleClass(active);
                // Remove active on already checked buttons to act like radio buttons
                if ($alreadyChecked.length) {
                    $alreadyChecked.removeClass(active);
                }
                isActive = $this.hasClass(active);
                if (isActive) {
                    checked.push($this.data('filterValue'));
                }
                services = checked;
                filter();
            });
        },
        filter = function() {
            if (hasActiveFilters()) {
                $grid.shuffle('shuffle', function($el) {
                    return itemPassesFilters($el.data());
                });
            } else {
                $grid.shuffle('shuffle', 'all');
            }
        },
        itemPassesFilters = function(data) {
            // If a services filter is active
            if (services.length > 0 && !valueInArray(data.color, services)) {
                return false;
            }
            return true;
        },
        hasActiveFilters = function() {
            return services.length > 0;
        },
        valueInArray = function(value, arr) {
            return $.inArray(value, arr) !== -1;
        };
    return {
        init: init
    };
}(jQuery));
jQuery(document).ready(function() {
    Exports.Modules.Gallery.init();
});