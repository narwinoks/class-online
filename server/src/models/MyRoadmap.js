module.exports = (sequelize, DataTypes) => {
  const MyRoadmap = sequelize.define(
    "MyRoadmap",
    {
      id: {
        type: DataTypes.INTEGER,
        autoIncrement: true,
        primaryKey: true,
        allowNUll: false,
      },
      user_id: {
        type: DataTypes.INTEGER,
        allowNUll: false,
      },
      roadmap_id: {
        type: DataTypes.INTEGER,
        allowNUll: false,
      },
      createdAt: {
        type: DataTypes.DATE,
        field: "created_at",
        allowNUll: false,
      },
      updatedAt: {
        type: DataTypes.DATE,
        field: "updated_at",
        allowNUll: false,
      },
    },
    {
      tableName: "my_roadmaps",
      timestamps: true,
    }
  );
  MyRoadmap.associate = (models) => {
    MyRoadmap.belongsTo(models.Roadmap, {
      foreignKey: "roadmap_id",
    });
  };
  return MyRoadmap;
};
