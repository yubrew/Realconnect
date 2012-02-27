<h1>An article was submitted for review</h1>
<p>
	Article #<?php echo $writerAssignment['WriterAssignment']['id'] ?> : <a href="<?php echo $this->Html->url('/manager/articles/review/'. $writerAssignment['WriterAssignment']['id'] .'/'.$articleNotificationId, true) ?>">Review</a>
</p>
