<script type="text/javascript">
window.onbeforeunload = function (e) {
  e = e || window.event;
  if (e) {
    e.returnValue = 'ATENÇÃO: Se sair todo conteudo sera perdido.';
  }
  return 'ATENÇÃO: Se sair todo conteudo sera perdido.';
};
</script>
<div class="contentpanel" ng-controller="quiz">
	<div class="row">
		<div class="col-md-3 pull-right" align="right">
			<button type="button" class="btn btn-lg btn-success" ng-click="addQuiz()">
				<i class="fa fa-plus"></i>&nbsp;Adicionar quiz
			</button>
		</div>
	</div>
	<br />
    <tabset>
		<tab heading="Configura&ccedil;&otilde;es" active="true">
			Título do quiz:
				<input type="text" ng-model="quiz.titulo" class="form-control" />
			<br />
			Descri&ccedil;&atilde;o: <textarea class="form-control" ng-model="quiz.descricao"></textarea>
			<br />
			Categoria:
			<select ng-model="quiz.categoria" class="form-control">
				<option value="famosos">Famosos</option>
				<option value="tv">TV</option>
				<option value="filmes">Filmes</option>
				<option value="musicas">Músicas</option>
				<option value="seriados">Seriados</option>

				<option value="fofo">Fofo</option>
				<option value="engracado">Engraçado</option>
				<option value="retro">Retrô</option>
				<option value="comida">Comida</option>
				<option value="amor">Amor</option>
				<option value="animais">Animais</option>

				<option value="moda">Moda</option>
				<option value="saude">Saúde</option>
				<option value="fitness">Fitness</option>
				<option value="beleza">Beleza</option>

				<option value="artes">Artes</option>
				<option value="livros">Livros</option>
				<option value="jogos">Jogos</option>
				<option value="tecnologia">Tecnologia</option>
				<option value="esportes">Esportes</option>
				<option value="mundo">Mundo</option>
				<option value="politica">Política</option>
				<option value="anime">Anime</option>
			</select>
			<br />
			
			Miniatura do quiz
				<input type="file" id="capa-quiz" ng-model="quiz.capa" ngf-select name="file" accept="image/*" />
		</tab>
		<tab heading="Quest&otilde;es">
			<div class="row">
				<div class="col-lg-8">
					<h3 align="center">Quest&otilde;es</h3>
					<div class="alert alert-info" ng-show="!quiz.questao.length">
						Insira uma quest&atilde;o usando o painel do lado direito.
					</div>
					<table class="table" ng-show="quiz.questao.length > 0">
						<tr>
							<th>Quest&atilde;o</th>
							<th>Capa</th>
							<th>Op&ccedil;&otilde;es</th>
						</tr>
						<tr ng-repeat="questao in quiz.questao">
							<td>{{questao.titulo}}</td>
							<td><img ng-src="{{'<?=BASE_URL_ADMIN?>static/' + questao.capa}}" width="70" height="70" /></td>
							<td>
								<button type="button" ng-click="excluirQuestao(questao)" class="btn btn-danger">
									<i class="fa fa-trash-o"></i>&nbsp;Excluir
								</button>
							</td>
						</tr>
					</table>
				</div>
				<div class="col-lg-4">
					Titulo da quest&atilde;o: <input type="text" class="form-control" ng-model="questaoEdit.titulo" /><br />
					Capa da quest&atilde;o: <input type="file" id="capa-questao" ng-model="questaoEdit.capa" ngf-select name="file" accept="image/*" /><br />
					<div class="row">
						<div class="col-lg-6">
							<button class="btn btn-block" type="button" ng-click="cancelarQuestao()">
								<i class="fa fa-close"></i>&nbsp;Cancelar
							</button>
						</div>
						<div class="col-lg-6">
							<button class="btn btn-primary btn-block" type="button" ng-click="salvarQuestao(questaoEdit)"><i class="fa fa-check"></i>&nbsp;Salvar quest&atilde;o</button>
						</div>
					</div>
				</div>
			</div>
		</tab>
		<tab heading="Op&ccedil;&otilde;es">
			<div class="row">
				<div class="col-lg-8">
					<h3 align="center">Op&ccedil;&otilde;es</h3>
					<div class="alert alert-info" ng-show="!quiz.questao.length">
						Insira uma questao antes de adicionar uma opcao.
					</div>
					<div ng-repeat="questao in quiz.questao" ng-show="questao.opcoes.length > 0">
						<h3>Quest&atilde;o: {{questao.titulo}}</h3>
						<table class="table">
							<tr>
								<th>Op&ccedil;&atilde;o</th>
								<th>Op&ccedil;&otilde;es</th>
							</tr>
							<tr ng-repeat="opcao in questao.opcoes">
								<td>{{opcao.opcao}}</td>
								<td>
									<button type="button" ng-click="excluirOpcao(questao, opcao)" class="btn btn-danger">
										<i class="fa fa-trash-o"></i>&nbsp;Excluir
									</button>
								</td>
							</tr>
						</table>
					</div>
				</div>
				<div class="col-lg-4">
					Opcao: <input type="text" class="form-control" ng-model="opcaoEdit.opcao" /><br />
					Quest&atilde;o: 
					<select class="form-control" ng-model="opcaoEdit.questao">
						<option ng-repeat="questao in quiz.questao" value="{{questao.titulo}}">
							{{questao.titulo}}
						</option>
					</select><br />
					<div class="row">
						<div class="col-lg-6">
							<button class="btn btn-block" type="button" ng-click="cancelarOpcao()">
								<i class="fa fa-close"></i>&nbsp;Cancelar
							</button>
						</div>
						<div class="col-lg-6">
							<button class="btn btn-primary btn-block" type="button" ng-click="salvarOpcao(opcaoEdit)"><i class="fa fa-check"></i>&nbsp;Salvar op&ccedil;&atilde;o</button>
						</div>
					</div>
				</div>
			</div>
		</tab>
		<tab heading="Resultados">
			<div class="row">
				<div class="col-lg-6">
					<h3 align="center">Resultados</h3>
					<div class="alert alert-info" ng-show="!quiz.resultados.length">
						Insira um resultado usando o painel ao lado direito.
					</div>
					<table class="table" ng-show="quiz.resultados.length > 0">
						<tr>
							<th>Titulo</th>
							<th>Descri&ccedil;&atilde;o</th>
							<th>Capa</th>
							<!--<th>Caminho</th>-->
							<th>Op&ccedil;&otilde;es</th>
						</tr>
						<tr ng-repeat="resultado in quiz.resultados">
							<td>{{resultado.titulo}}</td>
							<td>{{resultado.descricao}}</td>
							<td><img ng-src="{{'<?=BASE_URL_ADMIN?>static/' + resultado.capa}}" width="70" height="70" /></td>
							<!--<td>
								
							</td>-->
							<td>
								<button type="button" ng-click="editarResultado(resultado)" class="btn">
									<i class="fa fa-edit"></i>&nbsp;Editar
								</button>
								<button type="button" ng-click="excluirResultado(resultado)" class="btn btn-danger">
									<i class="fa fa-trash-o"></i>&nbsp;Excluir
								</button>
							</td>
						</tr>
					</table>
				</div>
				<div class="col-lg-6">
					Titulo: <input type="text" class="form-control" ng-model="resultadoEdit.titulo" /><br />
					Descri&ccedil;&atilde;o: <textarea class="form-control" ng-model="resultadoEdit.descricao"></textarea><br />
					Capa: <input type="file" id="capa-resultado" ng-model="resultadoEdit.capa" ngf-select name="file" accept="image/*" /><br />
					Marque as possibilidades de chegar nesse resultado: 
					<div ng-repeat="questao in quiz.questao">
						<h3>Quest&atilde;o: {{questao.titulo}}</h3>
						<table class="table">
							<tr ng-repeat="opcao in questao.opcoes">
								<td width="5%">
									<input type="checkbox" ng-model="resultadoEdit.questoes[questao.titulo].opcoes[opcao.opcao]" />
								</td>
								<td>
									{{opcao.opcao}}
								</td>
							</tr>
						</table>
					</div><br />
					<div class="row">
						<div class="col-lg-6">
							<button class="btn btn-block" type="button" ng-click="cancelarResultado()">
								<i class="fa fa-close"></i>&nbsp;Cancelar
							</button>
						</div>
						<div class="col-lg-6">
							<button class="btn btn-primary btn-block" type="button" ng-click="salvarResultado(resultadoEdit)"><i class="fa fa-check"></i>&nbsp;Salvar resultado</button>
						</div>
					</div>
				</div>
			</div>
		</tab>
    </tabset>
</div>