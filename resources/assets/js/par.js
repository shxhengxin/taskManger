
var ctx = $("#barChart");

var data = {
    labels : $('#bar-data').data('names'),
datasets : [{
    backgroundColor:'rgba(255,99,132,0.2)',
    borderColor: 'rgba(255,99,132,1)',
    borderWidth:1,
    data:$('#bar-data').data('counts'),
}]
}
var myBarChart = new Chart(ctx, {
    type: 'bar',
    data: data,
    options:{
        responsive:true,
        title:{
            display:true,
            text:'项目之间的任务总数对比',
        },
        legend:{
            display:false
        }
    }
});