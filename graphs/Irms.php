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
var IrmsValueline = d3.svg.line()
    .interpolate("monotone") //smooths the line
    .x(function(d) { return x(d.DateTime); })
    .y(function(d) { return y(d.Irms); });
    
// Adds the svg canvas
var IrmsSVG = d3.select("#svg"+block)
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
        d.Irms = +d.Irms;
    });

    // Scale the range of the data
    x.domain(d3.extent(data, function(d) { return d.DateTime; }));
    y.domain(d3.extent(data, function(d) {return d.Irms; }));
    // y.domain([0, d3.max(data, function(d) { return d.Irms; })]);

    // Draw Grids
    IrmsSVG.append("g")
        .attr("class", "grid")
        .attr("transform", "translate(0," + height + ")")
        .call(make_x_axis()
        .tickSize(-height, 0, 0)
        .tickFormat("")
    )
    IrmsSVG.append("g")
        .attr("class", "grid")
        .call(make_y_axis()
        .tickSize(-width, 0, 0)
        .tickFormat("")
    )

    // Add the valueline path.
    IrmsSVG.append("path")
        .attr("class", "line")
        .attr("d", IrmsValueline(data));

    // Add the X Axis
    IrmsSVG.append("g")
        .attr("class", "x axis")
        .attr("transform", "translate(0," + height + ")")
        .call(xAxis);

    IrmsSVG.append("text")
        .attr("transform","translate(" + (width/2) + " ," + (height+(margin.bottom/1.2)) + ")")
        .style("text-anchor", "middle")
        .text("Ημερομηνία/Ώρα");

    // Add the Y Axis
    IrmsSVG.append("g")
        .attr("class", "y axis")
        .call(yAxis);
    IrmsSVG.append("text")
        .attr("transform", "rotate(-90)")
        .attr("y", 6)
        .attr("x", margin.top - (height / 2))
        .attr("dy", ".71em")
        .style("text-anchor", "end")
        .text("Irms (A)");

    // Add title to the graph
    IrmsSVG.append("text")
        .attr("x", (width / 2))
        .attr("y", 0 - (margin.top / 2))
        .attr("text-anchor", "middle")
        .style("font-size", "16px")
        .style("text-decoration", "underline")
        .text("Ηλεκτρική Ένταση (Ρεύμα)");
});

function updateIrmsData() {
    // Get the data again
    d3.csv("dataToCSV.php", function(error, data) {
    data.forEach(function(d) {
    d.DateTime = parseDate(d.DateTime);
    d.Irms = +d.Irms;
    });
    // Scale the range of the data again
    x.domain(d3.extent(data, function(d) { return d.DateTime; }));
    y.domain(d3.extent(data, function(d) {return d.Irms; }));
    // y.domain([0, d3.max(data, function(d) { return d.Irms; })]);
    // Select the section we want to apply our changes to
    var IrmsSVG = d3.select("#svg"+block).transition();
    // Make the changes
    IrmsSVG.select(".line") // change the line
    .duration(750)
    .attr("d", IrmsValueline(data));
    IrmsSVG.select(".x.axis") // change the x axis
    .duration(750)
    .call(xAxis);
    IrmsSVG.select(".y.axis") // change the y axis
    .duration(750)
    .call(yAxis);
});
}
</script>