var ctx = $('#pieChart');
var data = {
        datasets: [{
            data: [$('#pieChart').data('todo'),$('#pieChart').data('done')],
            backgroundColor:["#FF6384", "#36A2EB"],
            hoverBackgroundColor:["#FF6384", "#36A2EB"]
        }],
        labels: [
            '未完成',
            '已完成'
        ]
    }
var options = {
    responsive: true,//是否响应式
    title: {
        display: true,//是否显示
        text: "所有任务完成的比例(总数："+$("#pieChart").data('total')+")"

    }
}

var myPieChart = new Chart(ctx, {
    type: 'pie',
    data: data,
    options: options
});