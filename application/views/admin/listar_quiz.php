<div class="contentpanel">
	<table class="table">
		<thead>
			<tr>
				<td>#</td>
				<td>T&iacute;tulo</td>
				<td>Categoria</td>
				<td>Data</td>
				<td>Op&ccedil;&otilde;es</td>
			</tr>
		</thead>
		<tbody>
			<?php
				if ( is_array( $quizes ) )
				{
					foreach ( $quizes as $quiz )
					{
			?>
				<tr>
					<td><?=$quiz->id?></td>
					<td><?=$quiz->titulo?></td>
					<td><?=$quiz->categoria?></td>
					<td><?=date('H:i - d/m/Y', strtotime($quiz->data_inserido))?></td>
					<td>
						<!--<button type="button" class="btn">
							<i class="fa fa-edit"></i>&nbsp;Editar
						</button>-->
						<a href="<?=BASE_URL_ADMIN?>admin/excluirquiz/<?=$quiz->id?>" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este quiz?')">
							<i class="fa fa-trash-o"></i>&nbsp;Excluir
						</a>
					</td>
				</tr>
			<?php
					}
				} else
				{
			?>
				<tr>
					<td colspan="100%">
						<div align="center">
							Nenhum quiz adicionado at&eacute; o momento.
						</div>
					</td>
				</tr>
			<?php
				}
			?>
		</tbody>
	</table>
</div>