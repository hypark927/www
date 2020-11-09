var options = {
			'legend':{
				names: ['필수 아노산', 'isoleusine', 'leucine']
					},
			'dataset':{
				title:'설갱미의 우수한 영양성', 
				values: [[32.05,29.78], [4.01,3.59], [8.51,7.17]],
				colorset: ['#FB7A1E','#999'],
				fields:['설갱미', '일반미']
				},
			'chartDiv' : 'chart19',
			'chartType' : 'multi_column',
			'chartSize' : {width:470, height:250},
			'maxValue' : 40,
			'increment' : 10
};

Nwagon.chart(options);


var options = {
			'legend':{
				names: ['향의 강도', '느끼한 맛', '쓴 맛', '떫은 맛', '부드러운 맛']
					},
			'dataset': {
				title: '주질향상',
				values: [[35,36,40,42,74], [65,57,60,60,30]], 
				bgColor: '#f4f1f1',
				fgColor: '#FB7A1E'
			},
			'chartDiv': 'chart11',
			'chartType': 'radar',
			'chartSize': {width:570, height:250}
		};

Nwagon.chart(options);
