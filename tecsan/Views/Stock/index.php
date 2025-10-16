<main class="content">
	<div class="container-fluid p-0">

		<div class="row mb-2 mb-xl-3">
			<div class="col-auto d-none d-sm-block">
				<h3><strong>Estoque</strong></h3>
			</div>

			<div class="col-auto ms-auto text-end mt-n1">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
						<li class="breadcrumb-item"><a href="#">Disponiveis</a></li>
						<li class="breadcrumb-item active" aria-current="page"><a href="#">Indisponiveis</a></li>
					</ol>
				</nav>
			</div>
		</div>

		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<div class="row">
							<div class="col-md-6">
								<h5 class="card-title mb-0">Produtos</h5>
							</div>
							<div class="col-md-6 text-end">
								<a class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addParams">Novo Produto</a>
								<a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#trashProducts">
									<i class="text-light" data-feather="trash-2"></i>
								</a>
							</div>

							<!-- MODAL LIXEIRA PRODUTOS -->
							<div class="modal fade" id="trashProducts" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-xl modal-dialog-centered" role="document">
									<div class="modal-content">
										<div class="modal-header">
											Produtos Excluidos
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<form method="POST">
											<table id="datatables-reponsive" class="table dataTable no-footer dtr-inline table-hover" style="width: 100%;" role="grid" aria-describedby="datatables-reponsive_info">
												<thead>
													<tr>
														<th>Produto</th>
														<th>Descrição</th>
														<th>Quantidade</th>
														<th>Preço</th>
														<th>Categoría</th>
														<th>Ações</th>

													</tr>
												</thead>
												<tbody>

													<?php if (isset($products_trash)) : ?>
														<?php foreach ($products_trash as $products) : ?>
															<tr>
																<td width="100"><?= $products['name_product']; ?></td>
																<td><?= $products['description']; ?></td>
																<td><?= $products['quantity']; ?></td>
																<td><?= $products['price']; ?></td>
																<td><?= $products['name_category']; ?></td>
																<td class="table-action" width="75">
																	<form action="">
																		<input type="hidden" class="form-control" name="out_trash" id="params_name" value="<?= $products['id_product']; ?>">
																		<a data-bs-toggle="modal" data-bs-target="#editProduct<?= $products['id_product']; ?>" class="me-2">
																			<i class="text-info" data-feather="check"></i>
																		</a>
																	</form>
																	<form method="$_POST">
																		<input type="hidden" class="form-control" name="delete" id="params_name" value="<?= $products['id_product']; ?>">
																		<a data-bs-toggle="modal" data-bs-target="#deleteProduct<?= $products['id_product']; ?>" class="">
																			<i class="text-danger" data-feather="delete"></i>
																		</a>
																	</form>
																	

																</td>

															</tr>
														<?php endforeach; ?>
													<?php endif; ?>
												</tbody>
											</table>
										</form>
									</div>
								</div>
							</div>
							<!-- FIM MODAL LIXEIRA PRODUTOS -->

							<!-- MODAL CRIAR PRODUTOS -->
							<div class="modal fade" id="addParams" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-sm modal-dialog-centered" role="document">
									<div class="modal-content">
										<div class="modal-header">
											Adicionar Produto
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<form method="POST">
											<div class="modal-body">
												<div class="row">
													<div class="col-md-12 mb-3">
														<label for="params_description" class="form-label">Categoria do Produto</label>
														<div>
															<select class="form-select" aria-label="Default select example" name="id_category">
																<option value="" disabled selected>Selecione a categoria</option>
																<?php foreach ($category_list as $category) : ?>
																	<option value="<?= $category['id_category']; ?>"><?= $category['name_category']; ?></option>
																<?php endforeach; ?>
															</select>
														</div>
													</div>
													<div class="col-md-12 mb-3">
														<div class="form-group">
															<label for="params_name" class="form-label">Nome do Produto</label>
															<input type="text" class="form-control" name="name" id="params_name" placeholder="Digite o nome do produto" required>
														</div>
													</div>
													<div class="col-md-12 mb-3">
														<div class="form-group">
															<label for="params_name" class="form-label">Quantidade do Produto</label>
															<input type="text" class="form-control" name="quantity" id="params_name" placeholder="Digite a quantidade do produto" required>
														</div>
													</div>
													<div class="col-md-12 mb-3">
														<div class="form-group">
															<label for="params_name" class="form-label">Preço do Produto</label>
															<input type="text" class="form-control" name="price" id="params_name" placeholder="Digite o preço do produto" required>
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group">
															<label for="params_description" class="form-label">Descrição do Produto</label>
															<input type="text" class="form-control" name="description" id="params_description" placeholder="Digite uma descrição para o produto" value="" required>
														</div>
													</div>
												</div>
											</div>
											<div class="modal-footer d-flex justify-content-end">
												<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
												<button type="submit" name="submit" class="btn btn-info">Adicionar Produto</button>
											</div>
										</form>
									</div>
								</div>
							</div>
							<!-- FIM MODAL CRIAR PRODUTOS -->
						</div>
						<hr>
					</div>
					<div class="card-body">



						<table id="datatables-reponsive" class="table dataTable no-footer dtr-inline table-hover" style="width: 100%;" role="grid" aria-describedby="datatables-reponsive_info">
							<thead>
								<tr>
									<th>Produto</th>
									<th>Descrição</th>
									<th>Quantidade</th>
									<th>Preço</th>
									<th>Categoría</th>
									<th>Ações</th>

								</tr>
							</thead>
							<tbody>

								<?php if (isset($products_list)) : ?>
									<?php foreach ($products_list as $products) : ?>
										<tr>
											<td width="100"><?= $products['name_product']; ?></td>
											<td><?= $products['description']; ?></td>
											<td><?= $products['quantity']; ?></td>
											<td><?= $products['price']; ?></td>
											<td><?= $products['name_category']; ?></td>
											<td class="table-action" width="75">
												<a data-bs-toggle="modal" data-bs-target="#editProduct<?= $products['id_product']; ?>" class="me-2">
													<i class="text-info" data-feather="edit"></i>
												</a>
												<a data-bs-toggle="modal" data-bs-target="#deleteProduct<?= $products['id_product']; ?>" class="">
													<i class="text-danger" data-feather="trash-2"></i>
												</a>
											</td>

										</tr>
										<!-- MODAL EDITAR PRODUTOS -->
										<div class="modal fade" id="editProduct<?= $products['id_product']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
											<div class="modal-dialog modal-sm modal-dialog-centered" role="document">
												<div class="modal-content">
													<div class="modal-body">
														<div class="row">
															<div class="col-md-12 mb-3">
																<div class="form-group">
																	<label for="params_name" class="form-label">Nome do Produto</label>
																	<input type="text" class="form-control" name="name" id="params_name" placeholder="<?= $products['name_product']; ?>" required>
																</div>
															</div>
															<div class="col-md-12 mb-3">
																<label for="params_description" class="form-label">Categoria do Produto</label>

																<select class="form-select" aria-label="Default select example">
																	<option selected>Open this select menu</option>
																	<option value="1">Processador</option>
																	<option value="2">Unidade de Armazenamento</option>
																	<option value="3">Fonte</option>
																</select>
															</div>
															<div class="col-md-12 mb-3">
																<div class="form-group">
																	<label for="params_name" class="form-label">Quantidade do Produto</label>
																	<input type="text" class="form-control" name="quantity" id="params_name" placeholder="<?= $products['quantity']; ?>" required>
																</div>
															</div>
															<div class="col-md-12 mb-3">
																<div class="form-group">
																	<label for="params_name" class="form-label">Preço do Produto</label>
																	<input type="text" class="form-control" name="price" id="params_name" placeholder="<?= $products['price']; ?>" required>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<label for="params_description" class="form-label">Descrição do Produto</label>
																	<input type="text" class="form-control" name="description" id="params_description" placeholder="<?= $products['description']; ?>" value="" required>
																</div>
															</div>
														</div>
													</div>
													<div class="modal-footer d-flex justify-content-end">
														<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
														<button type="submit" name="submit" class="btn btn-info">Editar Produto</button>
													</div>
													</form>
												</div>
											</div>
										</div>
										<!-- FIM MODAL EDITAR PRODUTOS -->

										<!-- MODAL DELETAR PRODUTOS -->
										<div class="modal fade" id="deleteProduct<?= $products['id_product']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
											<div class="modal-dialog modal-sm modal-dialog-centered" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<form method="POST">
														<div class="modal-body">
															<div class="row">
																<div class="col-md-12">

																	<h3>ATENÇÃO</h3>
																	<p class="text-muted fs-5">Ao deletar o nome do parâmetro, certifique-se que foram feita as devidas analises.</p>
																</div>
															</div>
														</div>
														<div class="modal-footer d-flex justify-content-end">
															<input type="hidden" class="form-control" name="id_product" id="params_name" value="<?= $products['id_product']; ?>">
															<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
															<button type="submit" class="btn btn-danger">Deletar</button>
														</div>
													</form>
												</div>
											</div>
										</div>
										<!-- FIM MODAL DELETAR PRODUTOS -->
									<?php endforeach; ?>
								<?php endif; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>


	</div>
</main>