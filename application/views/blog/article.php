<div class="container">
	<div class="row">
		<div class="col-md-10">
			<div class="row">
				<div class="col-md-12">
					<?= heading($title); ?>
					<p>
						<small>
							<?= nice_date($this->article->date, 'd/m/Y'); ?>
							-
							<?= $this->article->author ?>
							<?php if ($this->auth_user->is_connected) : ?>
								-
								<?= $this->article_status->label[$this->article->status]; ?>
							<?php endif; ?>
						</small>
					</p>
					<hr />
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<?= nl2br(htmlentities($this->article->content)); ?>
				</div>
			</div>
		</div>
		<div class="col-md-2">
			<ul class="nav nav-pills nav-stacked">
				<li><?= anchor('blog/index', "Liste articles") ?></li>
				<?php if ($this->auth_user->is_connected) : ?>
					<li>
						<?= anchor(['blog', 'edition', $this->article->id], "Modifier") ?>
					</li>
					<li>
						<?= anchor(['blog', 'suppression', $this->article->id], "Supprimer") ?>
					</li>
					<li>
						<?= anchor('blog/edition', "Nouvel article") ?>
					</li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
</div>
