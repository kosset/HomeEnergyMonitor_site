<script type="text/javascript">
// Set the dimensions of the canvas / graph
var margin = {top: 30, right: 20, bottom: 40, left: 50},
    width = 600 - margin.left - margin.right,
    height = 270 - margin.top - margin.bottom;

// Parse the date / time
var parseDate = d3.time.format("%Y-%m-%d %H:%M:%S").parse;

// Set the ranges
var x = d3.time.scale().range([0, width]);
var y = d3.scale.linear().range([height, 0]);

// Define the axes
var xAxis = d3.svg.axis().scale(x)
    .orient("bottom").ticks(10);

var yAxis = d3.svg.axis().scale(y)
    .orient("left").ticks(10);

// Define the line
var PValueline = d3.svg.line()
    .interpolate("monotone") //smooths the line
    .x(function(d) { return x(d.DateTime); })
    .y(function(d) { return y(d.P); });
    
// Adds the svg canvas
var PSVG = d3.select("#svg"+block)
    .append("svg")
        .attr("width", width + margin.left + margin.right)
        .attr("height", height + margin.top + margin.bottom)
    .append("g")
        .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

// Adds grid
function make_x_axis() {
    return d3.svg.axis()
        .scale(x)
        .orient("bottom")
        .ticks(20)
}
function make_y_axis() {
    return d3.svg.axis()
        .scale(y)
        .orient("left")
        .ticks(20)
}

// Get the data
d3.csv("dataToCSV.php", function(error, data) {
    data.forEach(function(d) {
        d.DateTime = parseDate(d.DateTime);
        d.P = +d.P;
    });

    // Scale the range of the data
    x.domain(d3.extent(data, function(d) { return d.DateTime; }));
    y.domain(d3.extent(data, function(d) {return d.P; }));
    // y.domain([0, d3.max(data, function(d) { return d.P; })]);

    // Draw Grids
    PSVG.append("g")
        .attr("class", "grid")
        .attr("transform", "translate(0," + height + ")")
        .call(make_x_axis()
        .tickSize(-height, 0, 0)
        .tickFormat("")
    )
    PSVG.append("g")
        .attr("class", "grid")
        .call(make_y_axis()
        .tickSize(-width, 0, 0)
        .tickFormat("")
    )

    // Add the valueline path.
    PSVG.append("path")
        .attr("class", "line")
        .attr("d", PValueline(data));

    // Add the X Axis
    PSVG.append("g")
        .attr("class", "x axis")
        .attr("transform", "translate(0," + height + ")")
        .call(xAxis);

    PSVG.append("text")
        .attr("transform","translate(" + (width/2) + " ," + (height+(margin.bottom/1.2)) + ")")
        .style("text-anchor", "middle")
        .text("Ημερομηνία/Ώρα");

    // Add the Y Axis
    PSVG.append("g")
        .attr("class", "y axis")
        .call(yAxis);
    PSVG.append("text")
        .attr("transform", "rotate(-90)")
        .attr("y", 6)
        .attr("x", margin.top - (height / 2))
        .attr("dy", ".71em")
        .style("text-anchor", "end")
        .text("P(W)");

    // Add title to the graph
    PSVG.append("text")
        .attr("x", (width / 2))
        .attr("y", 0 - (margin.top / 2))
        .attr("text-anchor", "middle")
        .style("font-size", "16px")
        .style("text-decoration", "underline")
        .text("Ενεργός Ισχύς");
});

function updatePData() {
    // Get the data again
    d3.csv("dataToCSV.php", function(error, data) {
    data.forEach(function(d) {
    d.DateTime = parseDate(d.DateTime);
    d.P = +d.P;
    });
    // Scale the range of the data again
    x.domain(d3.extent(data, function(d) { return d.DateTime; }));
    y.domain(d3.extent(data, function(d) {return d.P; }));
    // y.domain([0, d3.max(data, function(d) { return d.P; })]);
    // Select the section we want to apply our changes to
    var PSVG = d3.select("#svg"+block).transition();
    // Make the changes
    PSVG.select(".line") // change the line
    .duration(750)
    .attr("d", PValueline(data));
    PSVG.select(".x.axis") // change the x axis
    .duration(750)
    .call(xAxis);
    PSVG.select(".y.axis") // change the y axis
    .duration(750)
    .call(yAxis);
});
}
</script>