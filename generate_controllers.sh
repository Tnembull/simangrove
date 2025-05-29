#!/bin/bash

# List of all controllers to generate
controllers=(
  HomeController
  ProfileController
  AssessmentParameterController
  LocationController
  UnitController
  SpeciesController
  MeasurementSessionController
  PlotController
  PlotPointController
  ReferencePointController
  GrowthObservationController
  CanopyObservationController
  DamageObservationController
  MortalityObservationController
  SiteQualityController
  RegenerationRecordController
  FaunaObservationController
  PlotDocumentController
  PointAssessmentController
  ReviewController
  VerificationController
  PlotSummaryScoreController
  VisualizationController
  ReportController
  ExportController
  RecapController
)

# Generate each controller if not exist
for controller in "${controllers[@]}"
do
  file="app/Http/Controllers/${controller}.php"
  if [ ! -f "$file" ]; then
    echo "Generating $controller..."
    php artisan make:controller "$controller" --resource
  else
    echo "$controller already exists. Skipping..."
  fi
done

echo "✅ All controller generation completed."
