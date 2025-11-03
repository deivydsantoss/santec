<main class="content">
	<div class="container-fluid p-0">

		<div class="row mb-2 mb-xl-3">
			<div class="col-auto d-none d-sm-block">
				<h3><strong>Estoque</strong></h3>
			</div>

			<div class="col-auto ms-auto text-end mt-n1">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
						<li class="breadcrumb-item"><a href="#">Banco de Dados do Fornecedor</a></li>
						<li class="breadcrumb-item active" aria-current="page"><a href="#">Em falta</a></li>
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
														<th>Categoría</th>
														<th>Produto</th>
														<th>Fabricante</th>
														<th>Quantidade</th>
														<th>Preço</th>
														<th>Descrição</th>
														<th>Ações</th>

													</tr>
												</thead>
												<tbody>

													<?php if (isset($products_trash)) : ?>
														<?php foreach ($products_trash as $products) : ?>
															<tr>
																<td><?= $products['name_category']; ?></td>
																<td><?= $products['name_product']; ?></td>
																<td><?= $products['name_maker']; ?></td>
																<td><?= $products['quantity']; ?></td>
																<td>R$ <?= number_format($products['price'], 2, ',', '.'); ?></td>
																<td><?= $products['description']; ?></td>
																<td class="table-action" width="75">
																	<form method="POST">
																		<input type="hidden" class="form-control" name="restore" id="params_name" value="<?= $products['id_product']; ?>">
																		<button type="submit" data-bs-toggle="modal" data-bs-target="#editProduct<?= $products['id_product']; ?>" class="mb-1 btn btn-info">
																			<i class="text-light" data-feather="refresh-ccw"></i>
																		</button>
																	</form>
																	<form method="POST">
																		<input type="hidden" class="form-control" name="delete" id="params_name" value="<?= $products['id_product']; ?>">
																		<button type="submit" data-bs-toggle="modal" data-bs-target="#deleteProduct<?= $products['id_product']; ?>" class="btn btn-danger">
																			<i class="text-light" data-feather="delete"></i>
																		</button>
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
										<form method="POST" action="<?= BASE_URL . 'Stock/createProduct' ?>">
											<div class="modal-body">
												<div class="row">

													<div class="col-md-12 mb-3">
														<label for="params_description" class="form-label">Categoria do Produto</label>


														<a class="btn btn-sm bg-danger float-end ms-2" data-bs-toggle="modal">
															<i class="text-light" data-feather="minus"></i>
														</a>
														<a class="btn btn-sm bg-info float-end" data-bs-toggle="modal" data-bs-target="#addMaker">
															<i class="text-light" data-feather="plus"></i>
														</a>

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
														<label for="params_description" class="form-label">Fabricante do Produto</label>


														<a class="btn btn-sm bg-danger float-end ms-2" data-bs-toggle="modal">
															<i class="text-light" data-feather="minus"></i>
														</a>
														<a class="btn btn-sm bg-info float-end" data-bs-toggle="modal" data-bs-target="#addMaker">
															<i class="text-light" data-feather="plus"></i>
														</a>
														<div>
															<select class="form-select" aria-label="Default select example" name="id_maker">
																<option value="" disabled selected>Selecione o fabricante</option>
																<?php foreach ($makers_list as $maker) : ?>
																	<option value="<?= $maker['id_makers']; ?>"><?= $maker['name_maker']; ?></option>
																<?php endforeach; ?>
															</select>
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
															<input type="text" class="form-control" name="price" id="params_name" placeholder="R$ 0,00" required>
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
												<button type="submit" name="newproduct" class="btn btn-info">Adicionar Produto</button>
											</div>
										</form>
									</div>
								</div>
							</div>
							<!-- FIM MODAL CRIAR PRODUTOS -->

							<!-- MODAL CRIAR CATEGORIA -->
							<div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-sm modal-dialog-centered" role="document">
									<div class="modal-content">
										<form method="POST">
											<div class="modal-body">
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label for="params_name" class="form-label">Digite sua categoria</label>
															<input type="text" class="form-control" name="category" id="params_name" value="" required>
														</div>
													</div>
												</div>
											</div>
											<div class="modal-footer d-flex justify-content-end">
												<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
												<button type="newcategory" class="btn btn-info">Criar categoria</button>
											</div>
										</form>
									</div>
								</div>
							</div>
							<!-- FIM MODAL CRIAR CATEGORIA -->

							<!-- MODAL CRIAR FABRICANTE -->
							<div class="modal fade" id="addMaker" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-sm modal-dialog-centered" role="document">
									<div class="modal-content">
										<form method="POST">
											<div class="modal-body">
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label for="params_name" class="form-label">Digite o Fabricante</label>
															<input type="text" class="form-control" name="id_makers" id="params_name" value="" required>
														</div>
													</div>
												</div>
											</div>
											<div class="modal-footer d-flex justify-content-end">
												<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
												<button type="submit" name="maker" class="btn btn-info">Adicionar Fabricante</button>
											</div>
										</form>
									</div>
								</div>
							</div>
							<!-- FIM MODAL CRIAR FABRICANTE -->
						</div>
						<hr>
					</div>

					<div class="card-body">
						<table id="datatables-reponsive" class="table dataTable no-footer dtr-inline table-hover" style="width: 100%;" role="grid" aria-describedby="datatables-reponsive_info">
							<thead>
								<tr>
									<th>Categoría
										<a class="badge badge-circle rounded-circle bg-info ms-2" data-bs-toggle="modal" data-bs-target="#addCategory">
											<i class="text-light" data-feather="plus"></i>
										</a>
									</th>
									<th>Modelo</th>
									<th class="">Fabricante
										<a class="badge badge-circle rounded-circle bg-info ms-2" data-bs-toggle="modal" data-bs-target="#addMaker">
											<i class="text-light" data-feather="plus"></i>
										</a>
									</th>
									<th>Quantidade</th>
									<th>Preço</th>
									<th>Descrição</th>
									<th>Ações</th>
								</tr>
							</thead>
							<tbody>

								<?php if (isset($products_list)) : ?>
									<?php foreach ($products_list as $products) : ?>
										<tr>
											<td><?= $products['name_category']; ?></td>
											<td><?= $products['name_product']; ?></td>
											<td><?= $products['name_maker']; ?></td>
											<td><?= $products['quantity']; ?></td>
											<td>R$ <?= number_format($products['price'], 2, ',', '.'); ?></td>
											<td><?= $products['description']; ?></td>
											<td class="table-action align-content-center" width="75">
												<div class="d-flex ">
													<a data-bs-toggle="modal" data-bs-target="#editProduct<?= $products['id_product']; ?>" class=" me-2">
														<i class="text-info" data-feather="edit"></i>
													</a>
													<p class="">Editar</p>
												</div>
												<div class="d-flex">
													<a data-bs-toggle="modal" data-bs-target="#deleteProduct<?= $products['id_product']; ?>" class="me-2">
														<i class="text-danger" data-feather="trash-2"></i>
													</a>
													<p>Lixeira</p>
												</div>
											</td>

										</tr>
										<!-- MODAL EDITAR PRODUTOS -->
										<div class="modal fade" id="editProduct<?= $products['id_product']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
											<div class="modal-dialog modal-sm modal-dialog-centered" role="document">
												<div class="modal-content">
													<form method="POST">
														<div class="modal-body">
															<div class="row">
																<div class="col-md-12 mb-3">
																	<label for="params_description" class="form-label">Categoria do Produto</label>
																	<div>
																		<select class="form-select" aria-label="Default select example" name="id_category">
																			<option value="" selected>Selecione a categoria</option>
																			<?php foreach ($category_list as $category) : ?>
																				<option value="<?= $category['id_category']; ?>" <?= $category['id_category'] == $products['id_category'] ? 'selected' : '' ?>><?= $category['name_category']; ?></option>
																			<?php endforeach; ?>
																		</select>
																	</div>
																</div>
																<div class="col-md-12 mb-3">
																	<div class="form-group">
																		<label for="params_name" class="form-label">Nome do Produto</label>
																		<input type="text" class="form-control" name="name" id="params_name" value="<?= $products['name_product']; ?>" required>
																	</div>
																</div>
																<div class="col-md-12 mb-3">
																	<label for="params_description" class="form-label">Fabricante do Produto</label>
																	<div>
																		<select class="form-select" aria-label="Default select example" name="id_makers">
																			<option value="" selected>Selecione o fabricante</option>
																			<?php foreach ($makers_list as $maker) : ?>
																				<option value="<?= $maker['id_makers']; ?>" <?= $maker['id_makers'] == $products['id_maker'] ? 'selected' : '' ?>><?= $maker['name_maker']; ?></option>
																			<?php endforeach; ?>
																		</select>
																	</div>
																</div>

																<div class="col-md-12 mb-3">
																	<div class="form-group">
																		<label for="params_name" class="form-label">Quantidade do Produto</label>
																		<input type="text" class="form-control" name="quantity" id="params_name" value="<?= $products['quantity']; ?>" required>
																	</div>
																</div>
																<div class="col-md-12 mb-3">
																	<div class="form-group">
																		<label for="params_name" class="form-label">Preço do Produto</label>
																		<input type="text" class="form-control" name="price" id="params_name" value="R$ <?= number_format($products['price'], 2, ',', '.'); ?>" required>
																	</div>
																</div>
																<div class="col-md-12">
																	<div class="form-group">
																		<label for="params_description" class="form-label">Descrição do Produto</label>
																		<input type="text" class="form-control" name="description" id="params_description" value="<?= $products['description']; ?>" required>
																	</div>
																</div>
															</div>
														</div>
														<div class="modal-footer d-flex justify-content-end">
															<input type="hidden" class="form-control" name="id_product" id="params_name" value="<?= $products['id_product']; ?>">
															<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
															<button type="submit" name="edit" class="btn btn-info">Editar Produto</button>
														</div>
													</form>
												</div>
											</div>
										</div>
										<!-- FIM MODAL EDITAR PRODUTOS -->

										<!-- MODAL MOVER PARA LIXEIRA PRODUTOS -->
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
																	<p class="text-muted fs-5">Ao deletar o <?= $products['name_product'] ?>, certifique-se que foram feita as devidas analises.</p>
																</div>
															</div>
														</div>
														<div class="modal-footer d-flex justify-content-end">
															<input type="hidden" class="form-control" name="id_product" id="params_name" value="<?= $products['id_product']; ?>">
															<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
															<button type="submit" class="btn btn-danger">Mover para lixeria</button>
														</div>
													</form>
												</div>
											</div>
										</div>
										<!-- FIM MODAL MOVER PARA LIXEIRA PRODUTOS -->


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