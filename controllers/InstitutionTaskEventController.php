<?php

namespace app\controllers;

use Yii;
use app\models\InstitutionTaskEvent;
use app\models\InstitutionTaskEventSearch;
use app\models\Task;
use app\models\Event;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * InstitutionTaskEventController implements the CRUD actions for InstitutionTaskEvent model.
 */
class InstitutionTaskEventController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all InstitutionTaskEvent models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InstitutionTaskEventSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single InstitutionTaskEvent model.
     * @param integer $task_id
     * @param integer $event_id
     * @param integer $institution_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($task_id, $event_id, $institution_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($task_id, $event_id, $institution_id),
        ]);
    }

    /**
     * Creates a new InstitutionTaskEvent model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new InstitutionTaskEvent();
		$task_model = Task::find()->all();
		$event_model = Event::find()->all();
		
		$model->institution_id = Yii::$app->user->identity->institution_id;
		if (Yii::$app->request->get('event_id')) {
			$model->event_id = Yii::$app->request->get('event_id');
		};
		
        if ($model->load(Yii::$app->request->post())) {
			if (!$model->event_id) {
				$model->event_id = 1;
			};
			if ($model->save()) {
				return $this->redirect(['view', 'task_id' => $model->task_id, 'event_id' => $model->event_id, 'institution_id' => $model->institution_id]);
			}
        }

        return $this->render('create', [
            'model' => $model,
			'tasks' => $task_model,
			'events' => $event_model,
        ]);
    }

    /**
     * Updates an existing InstitutionTaskEvent model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $task_id
     * @param integer $event_id
     * @param integer $institution_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($task_id, $event_id, $institution_id)
    {
        $model = $this->findModel($task_id, $event_id, $institution_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'task_id' => $model->task_id, 'event_id' => $model->event_id, 'institution_id' => $model->institution_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing InstitutionTaskEvent model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $task_id
     * @param integer $event_id
     * @param integer $institution_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($task_id, $event_id, $institution_id)
    {
        $this->findModel($task_id, $event_id, $institution_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the InstitutionTaskEvent model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $task_id
     * @param integer $event_id
     * @param integer $institution_id
     * @return InstitutionTaskEvent the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($task_id, $event_id, $institution_id)
    {
        if (($model = InstitutionTaskEvent::findOne(['task_id' => $task_id, 'event_id' => $event_id, 'institution_id' => $institution_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
