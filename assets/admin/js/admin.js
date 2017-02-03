angular.module('equiz', ['ui.bootstrap', 'ngFileUpload'])

.controller('quiz',
	function( $scope, Upload, $http )
	{
		$scope.questaoEdit = {titulo: ''};
		$scope.opcaoEdit = {opcao: '', questao: ''};
		$scope.resultadoEdit = {titulo: '', descricao: '', capa: false, opcoes: {}};
		$scope.quiz = {
			questao: [],
			resultados: [],
			categoria: 'Famosos',
			descricao: ''
		};
		$scope.cancelarQuestao = function()
		{
			$scope.questaoEdit = {titulo: '', capa: false};
			document.getElementById("capa-questao").value = "";
		}
		$scope.cancelarOpcao = function()
		{
			$scope.opcaoEdit = {opcao: '', questao: ''};
		}
		$scope.cancelarResultado = function()
		{
			$scope.resultadoEdit = {titulo: '', capa: false};
		}
		
		$scope.salvarQuestao = function( questaoEdit )
		{
			var insert = {titulo: questaoEdit.titulo};
			if ( questaoEdit.capa )
			{
				Upload.upload({
					url: BASE_URL + 'admin/upload',
					fields: {},
					file: questaoEdit.capa
				})
				.success(function (json, status, headers, config) {
					if ( json.status == 'OK' )
					{
						insert.capa = json.file;
						$scope.quiz.questao.unshift( insert );
						$scope.questaoEdit = {titulo: '', capa: false};
						document.getElementById("capa-questao").value = "";
					} else
						alert('Erro ao fazer upload da capa do quiz, tente novamente!');
				});
			}
		}
		
		$scope.salvarOpcao = function( opcaoEdit )
		{
			var ind;
			for ( var q in $scope.quiz.questao )
			{
				if ( $scope.quiz.questao[q].titulo == opcaoEdit.questao )
				{
					ind = q;
					break;
				}
			
			}
			
			if ( !$scope.quiz.questao[ind].opcoes )
				$scope.quiz.questao[ind].opcoes = [];
			$scope.quiz.questao[ ind ].opcoes.push({opcao: opcaoEdit.opcao});
			$scope.opcaoEdit = {opcao: ''};
		}
		
		$scope.salvarResultado = function( resultadoEdit )
		{
			var insert = {};
			insert.titulo = resultadoEdit.titulo;
			insert.descricao = resultadoEdit.descricao;
			insert.questoes = resultadoEdit.questoes;
			
			if ( resultadoEdit.capa )
			{
				Upload.upload({
					url: BASE_URL + 'admin/upload',
					fields: {},
					file: resultadoEdit.capa
				})
				.success(function (json, status, headers, config) {
					if ( json.status == 'OK' )
					{
						insert.capa = json.file;
						$scope.quiz.resultados.unshift( insert );
						$scope.resultadoEdit = {titulo: '', descricao: '', capa: false, questoes:{}};
						document.getElementById("capa-resultado").value = "";
					} else
						alert('Erro ao fazer upload da capa do quiz, tente novamente!');
				});
			}
		}
		
		$scope.editarResultado = function( resultado )
		{
			document.getElementById("capa-resultado").value = "";
			$scope.resultadoEdit = resultado;
		}
		
		$scope.excluirQuestao = function( questao )
		{
			if ( confirm('Tem certeza que deseja remover esta questao?') )
				$scope.quiz.questao.splice( $scope.quiz.questao.indexOf( questao ), 1 );
		}
		
		$scope.excluirOpcao = function( questao, opcao )
		{
			$scope.quiz.questao[ $scope.quiz.questao.indexOf( questao ) ].opcoes.splice( 
				$scope.quiz.questao[ $scope.quiz.questao.indexOf( questao ) ].opcoes.indexOf( opcao ),
				1
			);
		}
		
		$scope.excluirResultado = function( resultado )
		{
			$scope.quiz.resultados.splice( $scope.quiz.resultados.indexOf(resultado), 1 );
		}
		
		$scope.addQuiz = function()
		{
			Upload.upload({
				url: BASE_URL + 'admin/quiz',
				fields: $scope.quiz,
				file: $scope.quiz.capa
			})
			.success(function(json, status, headers, config)
			{
				if ( json.status == 'OK' )
				{
					alert('Quiz inserido com sucesso!');
					window.location.href = BASE_URL + 'admin/listar';
				} else
					alert('Erro ao inserir quiz');
			});
		}
	}
);