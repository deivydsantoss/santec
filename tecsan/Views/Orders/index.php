<main class="content">
	<div class="container-fluid p-0">

		<div class="row mb-2 mb-xl-3">
			<div class="col-auto d-none d-sm-block">
				<h3><strong>Pedidos</strong></h3>
			</div>

			<div class="col-auto ms-auto text-end mt-n1">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
						<li class="breadcrumb-item"><a href="#">Em andamento</a></li>
						<li class="breadcrumb-item active" aria-current="page"><a href="<?= BASE_URL . 'Orders/ordersConcluded' ?>">Realizados</a></li>
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
								<h5 class="card-title mb-0">Pedidos</h5>
							</div>
							<div class="col-md-6 text-end">
								<a class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addOrders">Novo Pedido</a>
							</div>

							<!-- MODAL CRIAR PEDIDOS -->
							<div class="modal fade" id="addOrders" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-sm modal-dialog-centered" role="document">
									<div class="modal-content">
										<div class="modal-header">
											Adicionar Pedido
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<form method="POST" action="<?= BASE_URL . 'Orders/createOrders' ?>">
											<div class="modal-body">
												<div class="row">

													<div class="col-md-12 mb-3">
														<div class="form-group">
															<label for="params_name" class="form-label">Nome do Produto</label>
															<select class="form-select" aria-label="Default select example" name="id_product">
																<option value="" disabled selected>Selecione o fabricante</option>
																<?php foreach ($products_list as $products) : ?>
																	<option value="<?= $products['id_product']; ?>"><?= $products['name_product']; ?></option>
																<?php endforeach; ?>
															</select>
														</div>
													</div>
													<div class="col-md-12 mb-3">
														<label for="params_description" class="form-label">Fabricante do Produto</label>
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
															<label for="params_name" class="form-label">Preço Total</label>
															<input type="text" class="form-control" name="total_price" id="params_name" placeholder="R$ 0,00" required>
														</div>
													</div>
													<div class="col-md-12 mb-3">
														<div class="form-group">
															<label for="params_name" class="form-label">Preço Unitário do Produto</label>
															<input type="text" class="form-control" name="unit_price" id="params_name" placeholder="R$ 0,00" required>
														</div>
													</div>
													
													<div class="col-md-12">
														<div class="form-group">
															<label for="params_description" class="form-label">Prazo</label>
															<input type="date" class="form-control" name="delivery_time" id="params_description" placeholder="" value="" required>
														</div>
													</div>

												</div>
											</div>
											<div class="modal-footer d-flex justify-content-end">
												<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
												<button type="submit" name="neworder" class="btn btn-info">Adicionar Pedido</button>
											</div>
										</form>
									</div>
								</div>
							</div>
							<!-- FIM MODAL CRIAR PEDIDOS -->

						</div>
						<hr>
					</div>
					<div class="card-body">

						<table id="datatables-reponsive" class="table dataTable no-footer dtr-inline table-hover" style="width: 100%;" role="grid" aria-describedby="datatables-reponsive_info">
							<thead>
								<tr>
									<th>ID</th>
									<th>Modelo</th>
									<th>Fabricante</th>
									<th>Quantidade</th>
									<th>Preço Total</th>
									<th>Preço Unitário</th>
									<th>Data de compra</th>
									<th>Prazo</th>
									<th>Data de entrega</th>
									<th>Ações</th>
								</tr>
							</thead>
							<tbody>

								<?php if (isset($orders_list)) : ?>
									<?php foreach ($orders_list as $order) : ?>
										<tr>
											<td><?= $order['id_order']; ?></td>
											<td><?= $order['name_product']; ?></td>
											<td><?= $order['name_maker']; ?></td>
											<td><?= $order['quantity']; ?></td>
											<td>R$ <?= number_format($order['total_price'], 2, ',', '.'); ?></td>
											<td>R$ <?= number_format($order['unit_price'], 2, ',', '.'); ?></td>
											<td><?= date('d/m/Y', strtotime($order['purchase_date'])); ?></td>
											<td><?= date('d/m/Y', strtotime($order['delivery_time'])); ?></td>
											<td><?= date('d/m/Y', strtotime($order['delivery_date'])); ?></td>
											<td class="table-action align-content-center" width="75">
												<div class="">
													<button type="button" class="btn " data-bs-toggle="dropdown" aria-expanded="false">
														<i class="text-black" data-feather="more-vertical"></i>
													</button>

													<ul class="dropdown-menu">
														<li class="ps-4">
															<a class="d-flex align-content-center text-decoration-none" data-bs-toggle="modal" data-bs-target="#editOrders<?= $order['id_order']; ?>" class="dropdown-item ">
																<i class="text-black " data-feather="edit"></i>
																<p class="ms-2">Editar</p>
															</a>
														</li>
														<li class="ps-4">
															<a class="d-flex align-content-center text-decoration-none" data-bs-toggle="modal" data-bs-target="#confirmOrders<?= $order['id_order']; ?>" class="dropdown-item ">
																<i class="text-black " data-feather="check-square"></i>
																<p class="ms-2">Confirmar</p>
															</a>
														</li>
														<li>
															<hr class="dropdown-divider">
														</li>
														<li class="ps-4">
															<a class="d-flex align-content-center text-decoration-none" data-bs-toggle="modal" data-bs-target="#deleteOrders<?= $order['id_order']; ?>" class="dropdown-item ">
																<i class="text-black " data-feather="trash-2"></i>
																<p class="ms-2">Deletar</p>
															</a>
														</li>
													</ul>
												</div>

											</td>
										</tr>


										<!-- MODAL EDITAR PEDIDOS -->
										<div class="modal fade" id="editOrders<?= $order['id_order']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
											<div class="modal-dialog modal-sm modal-dialog-centered" role="document">
												<div class="modal-content">
													<div class="modal-header">
														Editar Pedido
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<form method="POST" action="<?= BASE_URL . 'Orders/editOrders' ?>">
														<div class="modal-body">
															<div class="row">

																<div class="col-md-12 mb-3">
																	<div class="form-group">
																		<label for="params_name" class="form-label">Nome do Produto</label>
																		<select class="form-select" aria-label="Default select example" name="id_product">
																			<option value="" disabled selected>Selecione o fabricante</option>
																			<?php foreach ($products_list as $products) : ?>
																				<option value="<?= $products['id_product']; ?>"<?= $order['id_product'] == $products['id_product'] ? 'selected' : '' ?>><?= $products['name_product']; ?></option>
																			<?php endforeach; ?>
																		</select>
																	</div>
																</div>
																<div class="col-md-12 mb-3">
																	<label for="params_description" class="form-label">Fabricante do Produto</label>
																	<div>
																		<select class="form-select" aria-label="Default select example" name="id_maker">
																			<option value="" disabled selected>Selecione o fabricante</option>
																			<?php foreach ($makers_list as $maker) : ?>
																				<option value="<?= $maker['id_makers']; ?>" <?= $maker['id_makers'] == $products['id_maker'] ? 'selected' : '' ?>><?= $maker['name_maker']; ?></option>
																			<?php endforeach; ?>
																		</select>
																	</div>
																</div>
																<div class="col-md-12 mb-3">
																	<div class="form-group">
																		<label for="params_name" class="form-label">Quantidade do Produto</label>
																		<input type="text" class="form-control" name="quantity" id="params_name" value="<?= $order['quantity']; ?>" required>
																	</div>
																</div>
																<div class="col-md-12 mb-3">
																	<div class="form-group">
																		<label for="params_name" class="form-label">Preço Total</label>
																		<input type="text" class="form-control" name="total_price" id="params_name" placeholder="R$ 0,00" value="R$ <?= $order['total_price']; ?>" required>
																	</div>
																</div>
																<div class="col-md-12 mb-3">
																	<div class="form-group">
																		<label for="params_name" class="form-label">Preço Unitário do Produto</label>
																		<input type="text" class="form-control" name="unit_price" id="params_name" placeholder="R$ 0,00" value="R$ <?= $order['unit_price']; ?>" required>
																	</div>
																</div>
																<div class="col-md-12">
																	<div class="form-group">
																		<label for="params_description" class="form-label">Prazo</label>
																		<input type="date" class="form-control" name="delivery_time" id="params_description" placeholder="" value="" required>
																	</div>
																</div>

															</div>
														</div>
														<div class="modal-footer d-flex justify-content-end">
															<input type="hidden" class="form-control" name="id_order" value="<?= $order['id_order']; ?>">
															<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
															<button type="submit" name="editar" class="btn btn-info">Editar Pedido</button>
														</div>
													</form>
												</div>
											</div>
										</div>
										<!-- FIM MODAL EDITAR PEDIDOS -->

										<!-- MODAL CONFIRMAR PEDIDOS -->
										<div class="modal fade" id="confirmOrders<?= $order['id_order']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
																	<p class="text-muted fs-5">Ao confirmar o pedido <?= $order['id_order']; ?>, certifique-se que foram feita as devidas analises.</p>
																</div>
															</div>
														</div>
														<div class="modal-footer d-flex justify-content-end">
															<input type="hidden" class="form-control" name="id_product" id="params_name" value="<?= $order['id_order']; ?>">
															<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
															<button type="submit" class="btn btn-success">Confirmar</button>
														</div>
													</form>
												</div>
											</div>
										</div>
										<!-- FIM MODAL CONFIRMAR PEDIDOS -->

										<!-- MODAL APAGAR PEDIDOS  -->
										<div class="modal fade" id="deleteOrders<?= $order['id_order']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
																	<p class="text-muted fs-5">Ao deletar o pedido <?= $order['id_order']; ?>, certifique-se que foram feita as devidas analises.</p>
																</div>
															</div>
														</div>
														<div class="modal-footer d-flex justify-content-end">
															<input type="hidden" class="form-control" name="id_product" id="params_name" value="<?= $order['id_order']; ?>">
															<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
															<button type="submit" class="btn btn-danger">Deletar Pedido</button>
														</div>
													</form>
												</div>
											</div>
										</div>
										<!-- FIM MODAL APAGAR PEDIDOS -->

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